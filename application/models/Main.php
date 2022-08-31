<?php


namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getMembers()
    {
        $result = $this->db->row('SELECT photo, first_name, last_name, report_subject, email FROM members');
        return $result;
    }

}
