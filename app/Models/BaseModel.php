<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class BaseModel extends Model
{
    protected $db;

    public function __construct()
    {
       // parent::__construct();
        $this->db = \Config\Database::connect();
    }
}
