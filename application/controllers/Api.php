<?php
// import library dari REST_Controller
// require APPPATH . 'libraries/RESTController.php';
// extends class dari REST_Controller
class Api extends CI_Controller{
// constructor
  public function __construct(){
    parent::__construct();
  }
public function index(){
// testing response
    $response['status']=200;
    $response['error']=false;
    $response['message']='Hai from response';
// tampilkan response
    $this->response($response);
}
public function user_get(){
// testing response
    $response['status']=200;
    $response['error']=false;
    $response['user']['username']='erthru';
    $response['user']['email']='ersaka96@gmail.com';
    $response['user']['detail']['full_name']='Suprianto D';
    $response['user']['detail']['position']='Developer';
    $response['user']['detail']['specialize']='Android,IOS,WEB,Desktop';
//tampilkan response
    $this->response($response);
}
}
?>