<?php

class Member extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        
        
        // Load database
        $this->load->model('member_management');
    }

    public function addSubmit(){
        // $this->load->library('password');
         
         $data = array(
         'name' => $this->input->post('name'),
         'roll_number' => $this->input->post('roll_number'),
         'mobile_number' => $this->input->post('mobile_number'),
         'branch' => $this->input->post('branch'),
         'year' => $this->input->post('year')
         );
       ///
       if($this->member_management->addmember($data)){
           redirect('/members');
       }
     //redirect('/logout');
 }
 public function ajax_deleteuser(){
    $id = $this->input->post('id');
    if($this->member_management->deletemember($id)){
        echo 'success';
    }else{
        echo 'error';
    }
 }
 public function ajax_sealclaim(){
    $id = $this->input->post('id');
    if($this->member_management->sealclaim($id)){
        echo 'success';
    }else{
        echo 'error';
    }
 }
 public function editSubmit(){
    // $this->load->library('password');
     
     $data = array(
     'id' => $this->input->post('id'),
     'name' => $this->input->post('name'),
     'roll_number' => $this->input->post('roll_number'),
     'mobile_number' => $this->input->post('mobile_number'),
     'branch' => $this->input->post('branch'),
     'year' => $this->input->post('year'),
     'password' => $this->input->post('password')
     );
   ///
   if($this->member_management->editmembers($data)){
       redirect('/members');
   }
 //redirect('/logout');
}

public function addClaim(){
    $data = array(
        'member_id' => $this->input->post('member_id'),
        'reason' => $this->input->post('reason'),
        'value' => $this->input->post('value'),
        );
        if($this->member_management->addclaim($data)){
            redirect('/Member/claims/'.$data['member_id']);
        }
}
public function claims($id){
    $data['claims'] = $this->member_management->get_claims_from_id($id);
    $data['member_info']= $this->member_management->get_user_info_from_id($id);
      $this -> load -> view('templates/header',$data);
      $this -> load -> view('pages/claims',$data);
      $this -> load -> view('templates/footer',$data);  
}

 public function edit($id){
    // $this->load->library('password');
      $data['info'] = $this->member_management->get_user_info_from_id($id);
      $this -> load -> view('templates/header',$data);
      $this -> load -> view('pages/edit',$data);
      $this -> load -> view('templates/footer',$data);  
       ///
   
 //redirect('/logout');
}
public function delete(){
    // $this->load->library('password');
     
     $data = array(
     'name' => $this->input->post('name'),
     'roll_number' => $this->input->post('roll_number'),
     'mobile_number' => $this->input->post('mobile_number'),
     'branch' => $this->input->post('branch'),
     'year' => $this->input->post('year')
     );
   ///
   
 //redirect('/logout');
}

}


?>