<?php
class link_db {
    private $db;
    public function init() {
        $this -> db = new mysqli("localhost", "problemset", "problemset", "problemset");
    }
    public function close() {
        $this -> db -> close();
    }
    private function fetch_ac($query_col, $accordance, $value) {
        $query_str = "SELECT ".$query_col." FROM account WHERE ".$accordance." = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("s", $value);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($result);
        $stmt -> fetch();
        $stmt -> close();
        return $result;
    }
    public function fetch_ac_by_userid($query_col, $userid) {
        return $this -> fetch_ac($query_col, "userid", $userid);
    }
    public function fetch_ac_by_email($query_col, $email) {
        return $this -> fetch_ac($query_col, "email", $email);
    }
    public function insert_acc($userid, $passwd, $nickname, $email) {
        $query_str = "INSERT INTO account (userid, passwd, nickname, email) VALUES (?, ?, ?, ?)";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("ssss", $userid, $passwd, $nickname, $email);
        $stmt -> execute();
        $stmt -> close();
    }
    public function fetch_prob($prob_id, &$owner, &$title, &$desc, &$choice, &$options, &$ans, &$det_ans) {
        if(!is_numeric($prob_id)) {
            return false;
        }
        $query_str = "SELECT owner, title, prob_desc, choice, options, ans, det_ans FROM problem WHERE id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("i", $prob_id);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($owner, $title, $desc, $choice, $options, $ans, $det_ans);
        if($stmt -> num_rows == 0) {
            $stmt -> close();
            return false;
        } else {
            $stmt -> fetch();
        }
        $stmt -> close();
        return true;
    }
    public function insert_prob($owner, $title, $desc, $choice, $options, $ans, $det_ans) {
        $query_str = "INSERT INTO problem (owner, title, prob_DESC, choice, options, ans, det_ans) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("sssssss", $owner, $title, $desc, $choice, $options, $ans, $det_ans);
        $stmt -> execute();
        $stmt -> close();
    }
    public function update_prob($owner, $title, $desc, $choice, $options, $ans, $det_ans, $id) {
        $query_str = "UPDATE problem SET owner = ?, title = ?, prob_DESC = ?, choice = ?, options = ?, ans = ?, det_ans = ? WHERE id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("sssssssi", $owner, $title, $desc, $choice, $options, $ans, $det_ans, $id);
        $stmt -> execute();
        $stmt -> close();
    }
    public function prob_last_id() {
        $result = $this -> db -> query("SELECT id FROM problem ORDER BY id DESC LIMIT 1");
        $row = $result -> fetch_row();
        $result -> close();
        return $row[0];
    }
    public function prob_tot_num() {
        $result = $this -> db -> query("SELECT count(*) FROM problem");
        $row = $result -> fetch_row();
        $result -> close();
        return $row[0];
    }
    public function fetch_prob_list($begin, $num, &$result) {
        $pre_num = $begin - 1;
        if($pre_num < 0 || $num < 0) {
            return false;
        }
        $query_str = "SELECT l.id, title FROM (problem AS l) JOIN (SELECT id FROM problem ORDER BY id LIMIT ?, ?) AS r ON l.id = r.id ORDER BY l.id";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("ii", $pre_num, $num);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($row_id, $row_title);
        if($stmt -> num_rows == 0) {
            $stmt -> close();
            return false;
        } else {
            for($i = 0; $stmt -> fetch(); $i ++) {
                $result[$i]["id"] = $row_id;
                $result[$i]["title"] = $row_title;
            }
            $stmt -> close();
            return true;
        }
    }
    public function prob_set_last_id() {
        $result = $this -> db -> query("SELECT id FROM prob_set ORDER BY id DESC LIMIT 1");
        $row = $result -> fetch_row();
        $result -> close();
        return $row[0];
    }
    public function fetch_prob_set_info($set_id, &$title, &$owner) {
        if(!is_numeric($set_id)) {
            return false;
        }
        $query_str = "SELECT title, owner FROM prob_set WHERE id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("i", $set_id);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($title, $owner);
        if($stmt -> num_rows == 0) {
            $stmt -> close();
            return false;
        } else {
            $stmt -> fetch();
            $stmt -> close();
            return true;
        }
    }
    public function fetch_prob_set_list($begin, $num, &$result) {
        $pre_num = $begin - 1;
        if($pre_num < 0 || $num < 0) {
            return false;
        }
        $query_str = "SELECT l.id, title FROM (prob_set AS l) JOIN (SELECT id FROM prob_set ORDER BY id LIMIT ?, ?) AS r ON l.id = r.id ORDER BY l.id";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("ii", $pre_num, $num);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($row_id, $row_title);
        if($stmt -> num_rows == 0) {
            $stmt -> close();
            return false;
        } else {
            for($i = 0; $stmt -> fetch(); $i ++) {
                $result[$i]["id"] = $row_id;
                $result[$i]["title"] = $row_title;
            }
            $stmt -> close();
            return true;
        }
    }
    public function prob_set_tot_num() {
        $result = $this -> db -> query("SELECT count(*) FROM prob_set");
        $row = $result -> fetch_row();
        $result -> close();
        return $row[0];
    }
    public function fetch_prob_set_pid($set_id, &$pid) {
        if(!is_numeric($set_id)) {
            return false;
        }
        $query_str = "SELECT prob_id FROM prob_set_pid WHERE set_id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("i", $set_id);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($row);
        if($stmt -> num_rows == 0) {
            $stmt -> close();
            return false;
        } else {
            for($i = 0; $stmt -> fetch(); $i ++) {
                $pid[$i] = $row;
            }
            $stmt -> close();
            return true;
        }
    }
    public function delete_prob_set($id) {
        if(!is_numeric($id))
            return false;
        $id = intval($id);
        $suc = true;
        $query_str = "DELETE FROM prob_set WHERE id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("i", $id);
        $suc = $suc && $stmt -> execute();
        $stmt -> close();
        
        $query_str = "DELETE FROM prob_set_pid WHERE set_id = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("i", $id);
        $suc = $suc && $stmt -> execute();
        $stmt -> close();
        
        return $suc;
    }
    public function insert_prob_set($title, $owner, $pid, $id) {
        $query_str = "INSERT INTO prob_set (id, title, owner) VALUES (?, ?, ?)";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("iss", $id, $title, $owner);
        $stmt -> execute();
        $stmt -> close();

        $query_str = "INSERT INTO prob_set_pid (set_id, prob_id) VALUES (?, ?)";
        for($i = count($pid) - 1; $i >= 0; $i --) {
            $stmt = $this -> db -> prepare($query_str);
            $stmt -> bind_param("ii", $id, $pid[$i]);
            if($stmt -> execute()) {
                $stmt -> close();
            } else {
                $stmt -> close();
                return false;
            }
        }
        return true;
    }
    public function fetch_prob_status($aid, $pid) {
        $query_str = "SELECT status FROM sol_prob WHERE aid = ? AND pid = ?";
        $stmt = $this -> db -> prepare($query_str);
        $stmt -> bind_param("ii", $aid, $pid);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result($status);
        $stmt -> fetch();
        $stmt -> close();
        return $status;
    }
    public function update_prob_status($prob_id, $userid, $cur_status) {
        $aid = $this -> fetch_ac_by_userid("id", $userid);
        if(!is_numeric($prob_id) || !is_numeric($aid)) {
            return false;
        }
        $ori_status = $this -> fetch_prob_status($aid, $prob_id);

        if(empty($ori_status)) {
            if(is_int($ori_status) && $cur_status == true) {
                $query_str = "UPDATE sol_prob SET status = ? WHERE aid = ? AND pid = ?";
            } else {
                $query_str = "INSERT INTO sol_prob (status, aid, pid) VALUES (?, ?, ?)";
            }
            $stmt = $this -> db -> prepare($query_str);
            $stmt -> bind_param("iii", $cur_status, $aid, $prob_id);
            $stmt -> execute();
            $stmt -> close();
        }
        return true;
    }
}
?>