<?php 

Class Feedback_Management extends CI_Model{
    public function get_target_list($username) {
        if($username != 'admin'){
            $cond = "roll_number='".$username."'";
            $this->db->select('id');
            $this->db->from('members');
            $this->db->where($cond);
            $this->db->limit(1);
            $query = $this->db->get()->result();
            $id = $query[0]->id;
            $con = "member_id='".$id."'";
            $this->db->select('target_id');
            $this->db->from('target_member_mapping');
            $this->db->where($con);
            $quer = $this->db->get()->result();
            $targets = array();
            foreach($quer as $query_obj){
                array_push($targets,$query_obj->target_id);
            }
            if(count($targets)>0){
            $this->db->select('*');
            $this->db->from('targets');
            $this->db->where_in('id',$targets);
            $this->db->where('done',0);
            $results = $this->db->get()->result();
            return $results;
            }else{
                return false;
            }
        }else{
            $this->db->select('*');
            $this->db->from('targets');
            $this->db->where('done',0);
            $results = $this->db->get()->result();
            return $results;
        }
        
    }
    
    public function get_id_from_roll_number($roll_number){
            if($roll_number!='admin'){
                $cond = "roll_number='".$roll_number."'";
                $this->db->select('id');
                $this->db->from('members');
                $this->db->where($cond);
                $this->db->limit(1);
                $query = $this->db->get()->result();
                $id = $query[0]->id;
                return $id;
            }else{
                return 0;
            }
           
    }

    public function get_feedback_list($id){
        $cond = "target_id='".$id."'";
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where($cond);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_name_from_id($id){
        if($id!=0){
            $cond = "id='".$id."'";
            $this->db->select('*');
            $this->db->from('members');
            $this->db->where($cond);
            $this->db->limit(1);
            $query = $this->db->get()->result();
            $name = $query[0]->name;
            return $name;
        }else{
            return 'admin';
        }
       
}

    public function addfeedback($data){
        if($this->db->insert('feedback',$data)){
            return true;
        }else{
            return $this->db->error();
        }

    }

    public function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }
}

?>