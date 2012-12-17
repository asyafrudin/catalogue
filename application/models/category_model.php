<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get()
	{
		$this->load->database();
		
		$query = $this->db->get('category');
		$result = $query->result_array();
		
		return $result;
	}
}