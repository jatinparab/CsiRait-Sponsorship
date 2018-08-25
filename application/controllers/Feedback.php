<?php

class Feedback extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
     //   $this->load->helper('form');
        
        // Load form validation library
      //  $this->load->library('form_validation');
        
        // Load session library
        
        
        // Load database
        $this->load->model('feedback_management');
    }
    

    public function addFeedback(){
        // $this->load->library('password');
        $originalDate = $this->input->post('date_visited');
        $newDate = date("Y-m-d", strtotime($originalDate));
         
         $data = array(
        'submitted_by'=> $this->input->post('submitted_by'),
         'date_visited' => $newDate,
         'target_id' => $this->input->post('target_id'),
         'people_visited' => json_encode($this->input->post('people_visited')),
         'feedback_content' => $this->input->post('feedback_content')
         );
       ///
       if($this->feedback_management->addfeedback($data)){
        redirect('/user_main');

       }
    //}
     //redirect('/logout');
 }
 

}


?>