<?php

namespace application\models;

use application\core\Model;


class Country extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function addCountry(array $country)
    {
        $result = $this->db->column(
            "INSERT INTO countries (id, name, code) 
            VALUES ( Null, :name, :code )",
            ['name' => $country['name'], 'code' => $country['code']]
        );
        return $result;
    }

    public function getCountryId(string $match)
    {
        $result = $this->db->column("SELECT id FROM countries WHERE name = :match or code = :match", ['match' => $match]);
        if(!empty($result)) {
            return intval($result);
        }
    }
}