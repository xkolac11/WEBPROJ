<?php


class ForumsModel Extends BaseModel{
	
	public function getForumsBySectionId($id){
		return dibi::query('SELECT * FROM forums WHERE sections_id=%i', $id);
	}
	
}