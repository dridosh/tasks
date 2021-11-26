<?php

class Task{

    private $id;


    public function __construct ($id) {
        $this->id = $id;
    }

    public function del () {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = 'DELETE FROM tasks WHERE id= :id';
        $res = $con->prepare($query);
        $res->execute([':id' => $this->id]);
    }

    public function toggle ($finished): void {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = 'UPDATE tasks SET finished = :toggle WHERE  id= :id';
        $res = $con->prepare($query);
        $res->execute([':id' => $this->id, ':toggle' => $finished]);
    }

    public static function getTasks (): array {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = 'SELECT * FROM tasks';
        $res = $con->query($query);
        $data = [];
        foreach ($res as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public static function add ($text): void {
        $connect_db = require 'connect_db.php';
        $con = $connect_db['con'];
        $query = "INSERT INTO fullstack.tasks (text, finished, employs_id) VALUES ('$text', '0', '1')";
        $con->query($query);
    }

}


