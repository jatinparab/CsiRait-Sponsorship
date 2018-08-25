<?php 

Class Member_Management extends CI_Model{
    public function addmember($data) {
        $data2 = array('username'=>$data['roll_number'],'name'=>$data['name'],'password'=>sha1('csirait'));
        if($this->db->insert('login',$data2)){
        if($this->db->insert('members',$data)){
            return true;
        }else{
            return false;
        }
    }
    }
    public function editmembers($data) {
        $this->db->where('id',$data['id']);
        if($this->db->update('members',$data)){
            return true;
        }
    }
    public function deletemember($id) {
        $this->db->where('id',$id);
        if($this->db->delete('members')){
            return true;
        }
    }

    public function read_member_info() {
        $this->db->select('*');
        $this->db->from('members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
    }
    public function get_user_info_from_id($id) {
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
}

?>