<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Categories_model extends CI_Model {

	function data_categories($id_category=null)

	{

		if (isset($id_category)) 

		{

			$this->db->where('id_category',$id_category);

		}

		$this->db->order_by('id_category desc');

		$query = $this->db->get('categories');

		return $query;

	}

	function data1_categories($id_category=null)

	{

		if (isset($id_category)) 

		{

			$this->db->where('id_category !=',$id_category);

		}

		$this->db->order_by('id_category desc');

		$query = $this->db->get('categories');

		return $query;

	}

	function add_data($category_name,$description)

	{

		$this->category_name = $category_name;

		$this->description = $description;



		$query =$this->db->insert('categories',$this);

		return $query;

	}

	function proses_update($id_category,$category_name,$description)

	{

		$this->category_name = $category_name;

		$this->description = $description;



		$query =$this->db->where('id_category',$id_category)->update('categories',$this);

		return $query;

	}

	function proses_delete($id_category)

	{

		$query =$this->db->where('id_category',$id_category)->delete('categories');

		return $query;

	}

}

