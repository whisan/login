<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model(['login_model','users_model']);
  }

  function index(){
    $this->load->view('login_view');
  }

  function auth(){
    $email    = $this->input->post('user_email',TRUE);
    $password = md5($this->input->post('user_password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $status = $data['status'];
        $sesdata = array(
            'user_name'    => $name,
            'user_email'   => $email,
            'user_level'   => $level,
            'status'       => $status,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1' && $status === '1'){
            redirect('page');

        // access login for staff
        }
        else if ($level === '0' && $status === '1') {
            redirect('page/staff');
        }

        else if ($level === '1' && $status === '0') {
            echo $this->session->set_flashdata('msg','<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Username</strong> <a href="#" class="alert-link">or Password</a> is Wrong.
</div>');
             redirect('login');
        }
        
    }else{
            echo $this->session->set_flashdata('msg','<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Username</strong> <a href="#" class="alert-link">or Password</a> is Wrong.
</div>');
             redirect('login');
     }
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }

  public function view(){ 
    $data['users'] = $this->users_model->getAllUsers();
    $this->load->view('admin', $data);
    #header('location:'.$this->view());
  }

  public function logs_btn(){ 
    $data['logs'] = $this->users_model->getLogs();
    $this->load->view('logs', $data);
    #header('location:'.$this->view());
  }

  public function addnew(){
    $this->load->view('addform.php');
  }

  public function register(){
    $this->load->view('register.php');
  }

  public function forgot_pass() {
    $this->load->view('forgot.php');
  }

  public function insert(){

    #$salt = md5(uniqid().mt_rand(0,40).microtime());

    $user['user_name'] = $this->input->post('user_name');
    $user['status'] = $this->input->post('status');
    #$user['password'] = sha1($salt.$this->input->post('password'));
    $user['user_password'] = md5($this->input->post('user_password'));
    $user['user_email'] = $this->input->post('user_email');
    $user['user_level'] = $this->input->post('user_level');
    #$user['sha_1'] = $salt;
    $user['status'] = 1;

    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    #$email = $this->input->post('email');
    $ip = $this->input->ip_address();

    $name = $this->session->userdata('user_name');
    $data_logs = array(
      'user' => $name ,
      'particular' => $user['user_name'] ,
      'ipadd' => $ip,
      'action' => 'Created'
    );
    $this->db->insert('logs', $data_logs);

    $user_id = $this->users_model->insertuser($user);

    $user_details = array(
      #'email' => $email,
      'fname' => $fname,
      'user_id' => $user_id,
      'lname' => $lname
    );
    $query2 = $this->users_model->insertuser_details($user_details);

    if($query2){
      //header('location:'.$this->view());
      redirect('login/view','refresh');
    }
    

  }

  public function reg(){

    #$salt = md5(uniqid().mt_rand(0,40).microtime());

    $user['user_name'] = $this->input->post('user_name');
    $user['status'] = $this->input->post('status');
    #$user['password'] = sha1($salt.$this->input->post('password'));
    $user['user_password'] = md5($this->input->post('user_password'));
    $user['user_email'] = $this->input->post('user_email');
    #$user['sha_1'] = $salt;
    $user['status'] = 1;

    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    #$email = $this->input->post('email');

   /* $id = $_GET['id'];
    $name = $this->session->userdata('user_name');*/
/*
    $data_logs = array(
      'user' => $name ,
      'particular' => $id ,
      'action' => 'Registered'
    );
    $this->db->insert('logs', $data_logs);*/


    $user_id = $this->users_model->insertuser($user);

    $user_details = array(
      #'email' => $email,
      'fname' => $fname,
      'user_id' => $user_id,
      'lname' => $lname
    );
    $query2 = $this->users_model->insertuser_details($user_details);
    
    if($query2){
      redirect(base_url());
    }

  }

  public function edit(){
    $id = $_GET['id'];
    $data['user'] = $this->users_model->getUser($id);
    $this->load->view('editform', $data);
  }

  public function update(){
    
    #$salt = md5(uniqid().mt_rand(0,40).microtime());

    $user['user_name'] = $this->input->post('user_name');
    $user['status'] = $this->input->post('status');
    #$user['password'] = sha1($salt.$this->input->post('password'));
    #$user['password'] = $this->input->post('password');
    $user['user_password'] = md5($this->input->post('user_password'));
    $user['user_email'] = $this->input->post('user_email');
    $user['user_level'] = $this->input->post('user_level');
    #$user['sha_1'] = $salt;
    /*$user['status'] = 1;*/

    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    #$email = $this->input->post('email');
    $id = $_GET['id'];
    $name = $this->session->userdata('user_name');
    $ip = $this->input->ip_address();
    $data_logs = array(
      'user' => $name ,
      'particular' => $id ,
      'ipadd' => $ip,
      'action' => 'Updated'
    );
 
    $this->db->insert('logs', $data_logs);


    $user_id = $this->users_model->updateuser($user, $id); 

    /*$id2 = $_GET['id'];*/
    $user_details = array(
      /*'user_id' => $user_id,*/
      #'email' => $email,
      'fname' => $fname,
      'lname' => $lname
    );
    $query2 = $this->users_model->updateuser_details($user_details,$id);
    
    if($query2){
      //header('location:'.$this->view());
      redirect('login/view','refresh');
    }
  }

  public function view_btn(){
    $id = $_GET['id'];
    $data['user'] = $this->users_model->getUserView($id);
    
    $this->load->view('view', $data);

    $name = $this->session->userdata('user_name');
    $ip = $this->input->ip_address();
    $data_logs = array(
      'user' => $name ,
      'particular' => $id ,
      'ipadd' => $ip,
      'action' => 'Viewed'
    );
 
    $this->db->insert('logs', $data_logs);

  }

  public function delete($id){
    $query = $this->users_model->deleteuser($id);

    $name = $this->session->userdata('user_name');
    $ip = $this->input->ip_address();
    $data_logs = array(
      'user' => $name ,
      'particular' => $id ,
      'ipadd' => $ip,
      'action' => 'Deleted'
    );
 
    $this->db->insert('logs', $data_logs);

    if($query){
      redirect('login/view','refresh');
    }
  }

  public function truncate(){
    $this->db->truncate('logs');
    redirect('login/logs_btn','refresh');
  }

  public function forget(){

    $email    = $this->input->post('user_email',TRUE);
    $create    = $this->input->post('datelog',TRUE);
    $validate = $this->login_model->valid_for($email,$create);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $status = $data['status'];
        $sesdata = array(
            'user_name'    => $name,
            'user_email'   => $email,
            'user_level'   => $level,
            'status'       => $status,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1' && $status === '1'){
            redirect('page');

        // access login for staff
        }
        else if ($level === '0' && $status === '1') {
            redirect('page/staff');
        }

        else if ($level === '1' && $status === '0') {
            echo $this->session->set_flashdata('msg','<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Username</strong> <a href="#" class="alert-link">or Password</a> is Wrong.
</div>');
             redirect('login');
        }
        
    }else{
            echo $this->session->set_flashdata('msg','<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Username</strong> <a href="#" class="alert-link">or Password</a> is Wrong.
</div>');
             redirect('login');
     }

  }

}
