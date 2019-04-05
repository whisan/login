<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model(['login_model','users_model']);
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('user_level')==='1'){
          $data['users'] = $this->users_model->getAllUsers();
          $this->load->view('admin', $data);
      }else{
          echo "Access Denied";
      }

  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('user_level')==='0'){
      $this->load->view('not_admin');
    }else{
        echo "Access Denied";
    }
  }

  /*function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
        echo "Access Denied";
    }
  }*/

}
