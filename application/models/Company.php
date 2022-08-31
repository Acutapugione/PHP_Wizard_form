<?php

namespace application\models;

use application\core\Model;


class Company extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function addCompany(array $company)
    {
        $result = $this->db->column(
            "INSERT INTO companies(`id`, `name`) 
            VALUES ( Null, ':name')",
            $company
        );
        return $result;
    }

    public function getCompanyId(string $match)
    {
        $result = $this->db->column('SELECT id FROM companies WHERE name = :match', ['match' => $match]);
        if(!empty($result)) {
            return $result[0];
        }
    }
}