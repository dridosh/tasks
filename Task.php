<?php

class Task{

    private $id;
    private $text;
    private $finished;

    /**
     * task constructor.
     * @param $text
     */
    public function __construct ($text) {
        $this->text = $text;
    }

    public function add (): void {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = "INSERT INTO fullstack.tasks (text, finished, employs_id) VALUES ('$this->text', '0', '1')";
        $con->query($query);
        $con->close();
    }

    public function del () {
        }


    public static function getTasks () {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = 'SELECT * FROM tasks';
        $res = $con->query($query);
        $data = [];
        while ($row = $res->fetch_assoc()) {
            $data[] = $row;
        }
        $con->close();
        return $data;

    }

}


