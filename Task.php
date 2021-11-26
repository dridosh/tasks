<?php

class Task{

    private $id;

    protected function connect () {
        $connect_db = require 'connect_db.php';
        return $connect_db['con'];
    }

    public function __construct ($id = 0) {
        $this->id = $id;
    }

    public function del (): void {
        $query = 'DELETE FROM tasks WHERE id= :id';
        $this->connect()->prepare($query)->execute([':id' => $this->id]);
    }

    public function toggle ($finished): void {
        $query = 'UPDATE tasks SET finished = :toggle WHERE  id= :id';
        $this->connect()->prepare($query)->execute([':id' => $this->id, ':toggle' => $finished]);
    }

    public function add ($text, $user_id): void {
        $query = "INSERT INTO tasks (text, finished, employs_id) VALUES (:text, '0', '1')";
        $this->connect()->prepare($query)->execute([':text' => $text]);
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

}


