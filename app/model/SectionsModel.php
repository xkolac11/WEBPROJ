<?php


class SectionsModel Extends BaseModel{
	
	public function getAllAsc(){
		return dibi::query('SELECT * FROM sections ORDER BY title ASC');
	}
	
	
	
}