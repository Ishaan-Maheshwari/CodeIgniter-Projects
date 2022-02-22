<?php

class UserModel extends CI_Model {

        public function __construct()
        {
                $this->load->library('mongo_db');
        }

        public function get_all_users(){
            return $this->mongo_db->get("authcollection");
        }

        public function set_user($data){
                return $this->mongo_db->insert("authcollection", $data);
        }

        public function verify_user($data){
                return $this->mongo_db->where($data)->get("authcollection");
        }
}
?>