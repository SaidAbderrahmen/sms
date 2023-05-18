<?php
namespace App\Models;

use App\Database\DB;

class Course
{
    private $db;
    private $table = 'course';

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAllCourses()
    {
        $query = "SELECT * FROM {$this->table}";
        $this->db->query($query);
        return $this->db->fetchAll();
    }

    public function getCourseById($id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function addCourse($name, )
    {
        $query = "INSERT INTO {$this->table} (name) VALUES (:name)";
        $this->db->query($query);
        $this->db->bind(':name', $name);
        $result = $this->db->execute();
        if ($result) {
            return $this->getAllCourses();
        } else {
            return false;
        }
    }
}
