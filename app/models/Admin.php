<?php

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


}

?>