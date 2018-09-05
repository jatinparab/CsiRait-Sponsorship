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
    public function get_deals(){
        $this->db->select('*');
        $this->db->where('done',1);
        $this->db->from('targets');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }

    }
    public function addclaim($data){
        if($this->db->insert('claims',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function get_id_from_username($username){
        $this->db->select('id');
        $this->db->where('roll_number',$username);
        $this->db->from('members');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result()[0]->id;
        } else {
        return false;
        }
    }
    public function get_claims_from_id($id){
        $this->db->select('*');
        $this->db->where('member_id',$id);
        $this->db->from('claims');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result();
        } else {
        return false;
        }
    }

    public function get_amount_from_id($id){
        $this->db->select('value');
        $this->db->where('id',$id);
        $this->db->from('deals');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
        return $query->result()[0]->value;
        } else {
        return false;
        }

    }
    public function editmembers($data) {
        if($data['password']!=''){
        $this->db->where('username', $data['roll_number']);
        $x['password'] = sha1($data['password']);
        
        }
        unset($data['password']);
        $this->db->update('login',$x);
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
    public function sealclaim($id) {
        $this->db->where('id',$id);
        if($this->db->delete('claims')){
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