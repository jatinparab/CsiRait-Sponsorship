<?php 

Class Target_Management extends CI_Model{
    public function addtarget($data) {
        if($this->db->insert('targets',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function get_member_list($id){
        $b=array();
        $cond = "target_id=".$id;
        $this->db->where($cond);
        $this->db->select('member_id');
        $this->db->from('target_member_mapping');
        $q = $this->db->get()->result();
        foreach($q as $a){
            array_push($b,$a->member_id);
        }
        
        $this->db->select('*');
        $this->db->from('members');
        if(count($b)>0){
            $this->db->where_not_in('id', $b);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }

    }

    public function edittarget($data) {
        $this->db->where('id',$data['id']);
        if($this->db->update('targets',$data)){
            return true;
        }
    }
    public function deletetarget($id) {
        $this->db->where('id',$id);
        if($this->db->delete('targets')){
            return true;
        }
    }

    public function read_all_targets() {
        $this->db->select('*');
        $this->db->from('targets');
        $this->db->where('done',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
    }
    public function closedeal($id){
        $this->db->set('done', 1);
        $this->db->where('id', $id);
        if($this->db->update('targets')){
            return true;
        }else{
            return false;
        }
    }
    public function read_target_for_user($id) {
        $condition = "id =".$id;
        $this->db->select('*');
        $this->db->from('members');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >0) {
        return $query->result();
        } else {
        return false;
        }
    }

    public function get_names($id){
        $name = array();
        $condition = "target_id=".$id;
        $this->db->select('*');
        $this->db->from('target_member_mapping');
        $this->db->where($condition);
        $query = $this->db->get();
        if($query->num_rows()>0){
            $query = $query->result();
            foreach($query as $row){
                $row_id = $row->id;
                $cond = "id=".$row->member_id;
                $this->db->select('name');
                $this->db->from('members');
                $this->db->where($cond);
                $query = $this->db->get();
                $nam = array('name'=>$query->result()[0]->name,'id'=>$row_id);
                array_push($name,$nam);
            }
            return $name;
        }
        
    }
    public function deletemap($id){
        $this->db->where('id',$id);
        if($this->db->delete('target_member_mapping')){
            return true;
        }
    }
    public function addmapping($data){
        if($this->db->insert('target_member_mapping',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function get_target_info_from_id($id) {
        $condition = "id =".$id;
        $this->db->select('*');
        $this->db->from('targets');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() >0) {
        return $query->result();
        } else {
        return false;
        }
    }
}

?>