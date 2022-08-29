<?php


namespace application\models;

use application\core\Model;

class Main extends Model
{
    public function getMembers()
    {
        /*photo Отображать фото при регистрации или дефолтное, если фото 
        не было загружено
        full name Выводить полное имя в одной ячейке
        report subject
        email Выводить ссылкой*/
        $result = $this->db->row('SELECT photo, first_name, last_name, report_subject, email FROM members');
        return $result;
    }
}
