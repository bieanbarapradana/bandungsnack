<?php



defined('BASEPATH') OR exit('No direct script access allowed');







class Products_model extends CI_Model {





	function data_products($id_product=null)



	{



		if (isset($id_product)) 



		{



			$this->db->where('product.id_product',$id_product);



		}

			$this->db->where('product.product_flag',0);



		$this->db->order_by('id_product desc');



		$this->db->from('categories');



		$this->db->join('product','product.id_category=categories.id_category');



		$this->db->join('seller','seller.id_seller=product.id_seller');



		$query = $this->db->get();



		return $query;



	}

	function data_products_flag($id_product=null)



	{



		if (isset($id_product)) 



		{



			$this->db->where('product.id_product',$id_product);



		}

			$this->db->where('product.product_flag',1);



		$this->db->order_by('id_product desc');



		$this->db->from('categories');



		$this->db->join('product','product.id_category=categories.id_category');



		$this->db->join('seller','seller.id_seller=product.id_seller');



		$query = $this->db->get();



		return $query;



	}





	function insert($id_seller,$id_category,$product_name,$product_price,$stock,$file_name,$promo,$discount,$description)



	{



		$this->id_seller = $id_seller;



		$this->id_category = $id_category;



		$this->product_name = $product_name;



		$this->product_price = $product_price;



		$this->stock = $stock;



		$this->description = $description;



		$this->photo = $file_name;

	



		$this->rating = 0;



		$this->promo = $promo;



		$this->discount = $discount;



		$this->product_flag = 0;







		$query = $this->db->insert('product',$this);



	//	echo $this->db->last_query($query);

		return $query;



	}

	function search($where,$batas_awal=null,$batas_akhir=null,$sort=null)

	{

		if (isset($batas_awal) AND isset($batas_akhir)) 

		{

			$this->db->limit($batas_awal,$batas_akhir);

		}

		$this->db->or_where('product_name like ','%'.$where.'%');

		$this->db->or_where('category_name like ','%'.$where.'%');

		$this->db->or_where('seller_name like ','%'.$where.'%');

		$this->db->or_where('product_price like ','%'.$where.'%');

		$this->db->or_where('discount like ','%'.$where.'%');

		$this->db->or_where('promo like ','%'.$where.'%');

		$this->db->where('product.product_flag',0);

		if (isset($sort)) 

		{

			$this->db->order_by($sort);

		}

		else

		{

		$this->db->order_by('rating desc');

		}

		$this->db->from('categories');



		$this->db->join('product','product.id_category=categories.id_category');



		$this->db->join('seller','seller.id_seller=product.id_seller');



		$query = $this->db->get();

		//echo $this->db->last_query($query)."<br/>";



		return $query;

	}

	function promo($where,$batas_awal=null,$batas_akhir=null,$sort=null)

	{

		if (isset($batas_awal) AND isset($batas_akhir)) 

		{

			$this->db->limit($batas_awal,$batas_akhir);

		}

		$where=1;

		$this->db->where('promo',$where);

		/*$this->db->or_where('category_name like ','%'.$where.'%');

		$this->db->or_where('seller_name like ','%'.$where.'%');

		$this->db->or_where('product_price like ','%'.$where.'%');

		$this->db->or_where('discount like ','%'.$where.'%');

		$this->db->or_where('promo like ','%'.$where.'%');*/

		$this->db->where('product.product_flag',0);

		if (isset($sort)) 

		{

			$this->db->order_by($sort);

		}

		else

		{

		$this->db->order_by('rating desc');

		}

		$this->db->from('categories');



		$this->db->join('product','product.id_category=categories.id_category');



		$this->db->join('seller','seller.id_seller=product.id_seller');



		$query = $this->db->get();

		//echo $this->db->last_query($query)."<br/>";



		return $query;

	}

	function update($id_product,$id_seller,$id_category,$product_name,$product_price,$stock,$promo,$discount,$description)



	{



		$this->id_seller = $id_seller;



		$this->id_category = $id_category;



		$this->product_name = $product_name;



		$this->product_price = $product_price;



		$this->stock = $stock;



		$this->description = $description;



		$this->promo = $promo;



		$this->discount = $discount;



		$query=$this->db->where('id_product',$id_product)->update('product',$this);



		return $query;



	}



	function flag($id_product,$flag)



	{



		$this->product_flag = $flag;



		$query = $this->db->where('id_product',$id_product)->update('product',$this);



		///echo $this->db->last_query($query);



		return $query;



	}



	function delete($id_product)



	{



		$query = $this->db->where('id_product',$id_product)->delete('product');



		///echo $this->db->last_query($query);



		return $query;



	}





	///  product atas



	function __product_atas($awal=null,$akhir=null)



	{





		$this->db->where('product_flag',0);

		$this->db->where('category_name !=','grosir');

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);

		 

			$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



	//	echo $this->db->last_query($query);



		return $query;



	}

	

	function __product_atas_local($awal=null,$akhir=null)



	{





		$this->db->where('product_flag',0);

		$this->db->where('category_name','grosir');

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);



		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



	//	echo $this->db->last_query($query);



		return $query;



	}
	
	function __product_atas_kue_basah($awal=null,$akhir=null)



	{





		$this->db->where('product_flag',0);

		$this->db->where('category_name','kue_basah');

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);



		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



	//	echo $this->db->last_query($query);



		return $query;



	}

	function __product_atas_next($awal=null,$akhir=null)



	{





		$this->db->where('product_flag',0);

		$this->db->where('category_name !=','grosir');

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);

		 

		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



	//	echo $this->db->last_query($query);



		return $query;



	}

	function __product_atas_next_local($awal=null,$akhir=null)



	{

		$this->db->where('category_name','grosir');

		$this->db->where('product_flag',0);

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);

		 

		

		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}
	
	function __product_atas_next_kue_basah($awal=null,$akhir=null)



	{

		$this->db->where('category_name','kue_basah');

		$this->db->where('product_flag',0);

		$this->db->order_by('id_product desc');



		$this->db->limit($akhir,$awal);

		 

		

		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}



	/// untuk mendapatkan data barang yang memiliki promo dan discount tertinggi ** hanya satu data



	function _promo_spesial()



	{



		$this->db->where('category_name !=','grosir');

		$this->db->where('product_flag',0);

		$this->db->where('promo',1);



		$this->db->order_by('discount desc');



		$this->db->limit(1,0);



		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}



	function _promo_spesial_2()



	{



		$this->db->where('product_flag',0);

		$this->db->where('promo',1);



		$this->db->order_by('discount desc');



		$this->db->limit(2,1);



		$query = $this->db->get('product');



		return $query;



	}



	function _new_product()



	{



		$this->db->where('product_flag',0);

		$this->db->order_by('id_product desc');



		$this->db->limit(1,0);



		$query = $this->db->get('product');



		return $query;



	}



	function _jajan_terlaris()



	{



		$this->db->where('category_name !=','grosir');



		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,0);



		

			$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');





		return $query;



	}

	function _jajan_terlaris_local()



	{

		$this->db->where('category_name','grosir');

		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,0);



			$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}
	
	function _jajan_terlaris_kue_basah()



	{

		$this->db->where('category_name','kue_basah');

		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,0);



			$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}

	function _jajan_terlaris_1_local()



	{



		$this->db->where('category_name','grosir');

		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,4);



		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}
	
	function _jajan_terlaris_1_kue_basah()



	{



		$this->db->where('category_name','kue_basah');

		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,4);



		$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');



		return $query;



	}

	function _paling_terlaris()



	{



		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(1);



		$query = $this->db->get('product');



		return $query;

	}

	function _list_terlaris()



	{



		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(9);



		$query = $this->db->get('product');



		return $query;

	}

	function _jajan_terlaris_1()



	{

		$this->db->where('category_name !=','grosir');

		

		$this->db->where('product_flag',0);

		$this->db->order_by('rating desc');



		$this->db->limit(4,4);



			$this->db->from('categories');

		$this->db->join('product','product.id_category=categories.id_category');

		

		$query = $this->db->get('');

		



		return $query;



	}

	

	//// batass



	///



	// total barang promo 



	function  total_barang_promo()



	{



		$this->db->select('count(id_product) as total_barang');

		$this->db->where('product_flag',0);



		$this->db->where('promo',1);



		$query = $this->db->get('product');



		return $query;



	}







	// batas promo



	/// ambil data berdasarkan seller id



	function get_data_product_use_id_seller($id_seller=null)


	{



		if (isset($id_seller)) 



		{

		

			$this->db->where('id_seller',$id_seller);

		

		}



		$this->db->where('product_flag',0);

		$this->db->limit(5);



		$this->db->order_by('id_product desc');



		$query = $this->db->get('product');



		return $query;



	}



	/// batas ambil data berdasarkan seller id



	///



	function update_bacth_product($data)

	{

		$query=$this->db->update_batch('product', $data, 'id_product');

		return $query;

	}

	function rating_bacth_product($data)

	{

		$query=$this->db->update_batch('product', $data, 'id_product');

		return $query;

	}

	

	

	///



}



