<?php 

namespace application\lib;

use PDO;
use Exception;


class Db
{
    protected $db;

    public function __construct() {
        $config = require 'application/config/db.php';

        try {
            $this->db = new PDO("mysql:host=".$config['host'].";dbname=".$config['name'], $config['user'], $config['password']);
        } catch ( Exception $e) {
            print $e->getMessage() . "\n";
        }
    }   

    public function query($sql, $params = [])
    {
        // extract( $params );
        $prepared = $this->db->prepare($sql);
        if (!empty($params)){
            foreach ($params as $param => $value) {
                $prepared->bindValue(":".$param, $value);
            }
        }
        $prepared->execute();
        return $prepared;
    }
    

    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}
