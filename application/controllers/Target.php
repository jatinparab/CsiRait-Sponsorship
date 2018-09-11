<?php

class Target extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        
        
        // Load database
        $this->load->model('target_management');
    }
    

    public function addSubmit(){
        // $this->load->library('password');
         $data = array(
         'name' => $this->input->post('name'),
         'mobile_number' => $this->input->post('mobile_number'),
         'address' => $this->input->post('address'),
         'instructions' => $this->input->post('instructions')
         );
       ///
        // print_r($data);
       if($this->target_management->addtarget($data)){
           redirect('/user_main');
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

 public function remove_member_map(){
     $id= $this->input->post('id');
     if($this->target_management->deletemap($id)){
        echo 'success';
    }else{
        echo 'error';
    }

 }
 public function confirm_deal(){
     $id = $this->input->post('id');
     $val = $this->input->post('value');
     if($this->target_management->closedeal($id,$val)){
         echo 'success';
     }else{
         echo 'error';
     }
 }

 public function ajax_add_member_map(){
    $member_id = $this->input->post('member_id');
    $target_id = $this->input->post('target_id');
    $data = array(
        'member_id' => $member_id,
        'target_id' => $target_id
    );
    //print_r($data);

    if($this->target_management->addmapping($data)){
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
        'mobile_number' => $this->input->post('mobile_number'),
        'address' => $this->input->post('address'),
        'instructions' => $this->input->post('instructions')
        );
   ///
   if($this->target_management->edittarget($data)){
       redirect('/user_main');
   }
 //redirect('/logout');
}

 public function edit($id){
    // $this->load->library('password');
      $data['info'] = $this->target_management->get_target_info_from_id($id);
      $this -> load -> view('templates/header',$data);
      $this -> load -> view('pages/edit_target',$data);
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

public function deleteDeal(){
    $id = $this->input->post('id');
    if($this->target_management->deletetarget($id)){
        echo 'success';
    }else{
        echo 'error';
    }
}
public function makeInactive(){
    $id = $this->input->post('id');
    
     if($this->target_management->makeinactive($id)){
         echo 'success';
     }else{
         echo 'error';
     }
}

}


?>