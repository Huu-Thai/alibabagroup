<?php

class Menus extends DB{
	protected $table = 'Menus';
	protected $primaryId = 'id';

	public function menu($parentId = 0){

		$query = "SELECT c.name, c.alias
				FROM $this->table AS m
				LEFT JOIN categories AS c ON m.category_id = c.id
				ORDER BY ordinal ASC
				WHERE parent_id = $parentId AND show_id = 1
		";

		return $this->result($query);
	}

	public function childMenu($parentId){

		$query = "SELECT c.name, c.alias
				FROM $this->table AS m
				LEFT JOIN categories AS c ON m.category_id = c.id
				ORDER BY ordinal ASC
				WHERE parent_id = $parentId AND show_id = 1
		";

		return $this->result($query);
	}
}