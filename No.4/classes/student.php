<?php
require_once 'database.php';

class Student extends Database {
    protected $table = "students";

    public function createStudent($data) {
        return $this->insert($this->table, $data);
    }

    public function getAllStudents() {
        return $this->selectAll($this->table);
    }

    public function getStudentById($id) {
        return $this->selectOne($this->table, "id = :id", ["id" => $id]);
    }

    public function updateStudent($id, $data) {
        return $this->update($this->table, $data, "id = :id", ["id" => $id]);
    }

    public function deleteStudent($id) {
        return $this->delete($this->table, "id = :id", ["id" => $id]);
    }
}
