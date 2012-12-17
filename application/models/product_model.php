<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function insert($code, $description, $price, $category_code)
	{
		$this->load->database();
		
		$newData = array(
						'code' => $code,
						'description' => $description,
						'price' => $price,
						'category_code' => $category_code
					);
		$this->db->insert('product', $newData);
	}
	
	function update($code, $columnname, $newvalue)
	{
		if ($columnname != 'code') // One dirty hack to prevent the PK column to be updated
		{
			$this->load->database();
			
			$newData = array(
							$columnname => $newvalue
						);
			$this->db->where('code', $code);
			$this->db->update('product', $newData);
		}
	}
	
	function delete($code)
	{
		$this->load->database();
		
		$this->db->where('code', $code);
		$this->db->delete('product');
	}
}