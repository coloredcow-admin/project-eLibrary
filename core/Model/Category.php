<?php
class Categories extends QueryBuilder{
	protected  $table='book_categories';
	protected  $names=['category_name'];
	public $values=[];
	public  function fetchCategory($values){
		return parent::fetchOne($this->table,['cid'],[$values]);
	}
	public function fetchCategories(){
		return parent::fetchList($this->table);
	}
	public function fetchBooks($cid){
		return parent::fetchList('has_category','cid',$cid);
	}
	public function freshCategory(){
		$row=$this->fetchCategory($this->values);
		if(isset($row))
			return FALSE;
		else
			return TRUE;
	}
	public function registerCategory(){
		if(parent::insert($this->table,$this->names,$this->values))
			header('location:/login?view=categories');
		else 
			Users::flashError('category Already Exists','/login');
	}
	public function updateCategory($cname,$cid){
		$update=['category_name'=>''];
		$update['category_name']=$cname;
		return parent::update($this->table,$update,'cid',$cid);
	}

	public function deleteCategory($cid){
		return parent::delete($this->table,'cid',$cid);
	}
	public function deleteAllBooks($cid){
		parent::delete('has_category','cid',$cid);
	}
}

?>