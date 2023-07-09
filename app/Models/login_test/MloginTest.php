<?php

namespace App\Models\login_test;

use App\Models\BaseModel;

class MloginTest extends BaseModel
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * verifyAcount function
     * @author ChiNguyen
     * @param $username
     * @param $password
     * @return false|mixed
     */
    public function verifyAcount($username, $password)
    {
        //$db = \Config\Database::connect();
        $builder = $this->db->table('users');
        $builder->select('id, username, password');
        $builder->where('username', $username);
        $builder->where('password', $password);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }
}