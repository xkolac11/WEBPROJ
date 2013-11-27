<?php

abstract class BaseModel extends Nette\Object {

    /** @var \DibiConnection */
    private $db;


    public function __construct(\DibiConnection $connection) {
        $this->db = $connection;
    }

}