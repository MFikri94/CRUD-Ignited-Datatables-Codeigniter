<?php
class Crud extends CI_Controller{
  function __construct(){
    parent::__construct();
      $this->load->library('datatables'); //load library ignited-dataTable
      $this->load->model('crud_model'); //load model crud_model
  }
  function index(){
      $x['category']=$this->crud_model->get_category();
      $this->load->view('crud_view',$x);
  }

  function get_product_json() { //get product data and encode to be JSON object
      header('Content-Type: application/json');
      echo $this->crud_model->get_all_product();
  }

  function save(){ //insert record method
      $this->crud_model->insert_product();
      redirect('crud');
  }

  function update(){ //update record method
      $this->crud_model->update_product();
      redirect('crud');
  }

  function delete(){ //delete record method
      $this->crud_model->delete_product();
      redirect('crud');
  }

}
