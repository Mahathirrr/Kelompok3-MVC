<?php

/**
 * Model mahasiswa berfungsi untuk menjalankan query
 * Sebelum menggunakan query, load dulu library database
 */

namespace Models;

use Libraries\Database;
use PDO;

class Page
{
    private $dbh;
    public function __construct()
    {
        $db = new Database();
        $this->dbh = $db->getInstance();
    }

    
}
