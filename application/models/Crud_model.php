<?php
class Crud_model extends CI_Model{
  //get all categories method
  function get_category(){
      $result=$this->db->get('categories');
      return $result;
  }
  //generate dataTable serverside method
  function get_all_product() {
      $this->datatables->select('product_code,product_name,product_price,category_id,category_name');
      $this->datatables->from('product');
      $this->datatables->join('categories', 'product_category_id=category_id');
      $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-code="$1" data-name="$2" data-price="$3" data-category="$4">Edit</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-code="$1">Delete</a>','product_code,product_name,product_price,category_id,category_name');
      return $this->datatables->generate();
  }
  //insert data method
  function insert_product(){
      $data=array(
        'product_code'        => $this->input->post('product_code'),
        'product_name'        => $this->input->post('product_name'),
        'product_price'       => $this->input->post('price'),
        'product_category_id' => $this->input->post('category')
      );
      $result=$this->db->insert('product', $data);
      return $result;
  }
  //update data method
  function update_product(){
      $product_code=$this->input->post('product_code');
      $data=array(
        'product_name'         => $this->input->post('product_name'),
        'product_price'        => $this->input->post('price'),
        'product_category_id'  => $this->input->post('category')
      );
      $this->db->where('product_code',$product_code);
      $result=$this->db->update('product', $data);
      return $result;
  }
  //delete data method
  function delete_product(){
      $product_code=$this->input->post('product_code');
      $this->db->where('product_code',$product_code);
      $result=$this->db->delete('product');
      return $result;
  }
}
