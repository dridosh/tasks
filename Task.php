<?php

    class Task {

        public $id;
        public $text;
        public $finished;


        protected function connect () {
            $connect_db = require 'connect_db.php';
            return $connect_db['con'];
        }

        public function __construct ($id = 0) {
            $this->id = $id;
            $this->getTask();
        }

        public function del (): void {
            $query = 'DELETE FROM tasks WHERE id= :id';
            $this->connect()->prepare($query)->execute([':id' => $this->id]);
        }

        public function toggle ($finished): void {
            $query = 'UPDATE tasks SET finished = :toggle WHERE  id= :id';
            $this->connect()->prepare($query)->execute([':id' => $this->id, ':toggle' => $finished]);
        }

        public function add ($text): void {
            $query = "INSERT INTO tasks (text, finished, employs_id) VALUES (:text, '0', '1')";
            $this->connect()->prepare($query)->execute([':text' => $text]);
        }

        public function update ($text): void {
            $this->text = $text;
            $query = "UPDATE tasks SET text = :text WHERE id= :id";
//            echo "<pre>";
//            var_dump( $this);
//            echo "</pre>";
//            die;
            $this->connect()->prepare($query)->execute([':id' => $this->id, ':text' => $this->text]);
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

        protected function getTask (): void {
            $query = 'SELECT * FROM tasks WHERE id= :id ';
            $con = $this->connect();
            $res = $con->prepare($query);
            $res->execute([':id' => $this->id]);
            $task = $res->fetch();

            if ($task) {
                $this->text = $task['text'];
                $this->finished = $task['finished'];

            }
        }

    }


