<?php
require_once 'database.php';

class Attendance extends Database {
    protected $table = "attendance";

    public function createAttendance($data) {
        return $this->insert($this->table, $data);
    }

    public function getAllAttendance() {
        return $this->selectAll($this->table);
    }

    public function getAttendanceById($id) {
        return $this->selectOne($this->table, "id = :id", ["id" => $id]);
    }

    public function updateAttendance($id, $data) {
        return $this->update($this->table, $data, "id = :id", ["id" => $id]);
    }

    public function deleteAttendance($id) {
        return $this->delete($this->table, "id = :id", ["id" => $id]);
    }
}
