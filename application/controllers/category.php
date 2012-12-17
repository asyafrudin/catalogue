<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{
	// Get all product categories
	public function get()
	{
		$this->load->model('category_model');
		$categories = $this->category_model->get();
		
		echo json_encode($categories);
	}
}
