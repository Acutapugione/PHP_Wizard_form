<?php


namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getMembers()
    {
        $result = $this->db->row('SELECT first_name, last_name FROM members');
        return $result;
    }
}
