<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
{
	// Get all products
	public function get()
	{
		$this->load->library('datatables');
		$result = $this->datatables->getData('v_product', array('', 'code', 'description', 'price', 'category'), 'code', true);
		
		echo $result;
	}
	
	// Save new product
	public function save()
	{
		$code = $this->input->post('code');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$category_code = $this->input->post('category_code');
		
		$this->load->model('product_model');
		$this->product_model->insert($code, $description, $price, $category_code);
	}
	
	// Edit existing products
	public function edit()
	{
		$code = $this->input->post('code');
		$attr = $this->input->post('columnname');
		$newval = $this->input->post('value');
		
		$this->load->model('product_model');
		$this->product_model->update($code, $attr, $newval);
	}
	
	// Delete existing products
	public function delete()
	{
		$code = $this->input->post('code');
		
		$this->load->model('product_model');
		$this->product_model->delete($code);
	}
}
