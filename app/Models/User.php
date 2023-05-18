<?php

namespace App\Models;

use App\Database\DB;
use App\Core\Session\Session;

class User {

	private $db;
	private $table = 'users';
    

	public function __construct()
	{
		$this->db = new DB;
	}

	public function login($email, $password)
{
    $query = "SELECT id, email, password, role FROM {$this->table} WHERE email = :email";

    $this->db->query($query);
    $this->db->bind(':email', $email);
    $data = $this->db->fetch();

    if ($data && verify($password, $data['password'])) {
        Session::set('user_id', $data['id']);
        Session::set('email', $data['email']);
        Session::set('role', $data['role']);
        return $data;
        }
    else {
        return false;
    }
}

private function getTeacherId($userId)
{
    $query = "SELECT id FROM teacher WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind(':user_id', $userId);
    $teacherData = $this->db->fetch();

    if ($teacherData) {
        return $teacherData['id'];
    } else {
        return false;
    }
}

private function getStudentId($userId)
{
    $query = "SELECT id FROM student WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind(':user_id', $userId);
    $studentData = $this->db->fetch();

    if ($studentData) {
        return $studentData['id'];
    } else {
        return false;
    }
}


public function addTeacher($email, $name, $password, $courseId)
{
    $hashedPassword = bcrypt($password);
    $role = 'teacher';

    // Add the user to the 'users' table
    $query = "INSERT INTO {$this->table} (name, email, password, role) VALUES (:name, :email, :password, :role)";
    $this->db->query($query);
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':password', $hashedPassword);
    $this->db->bind(':role', $role);
    $this->db->execute();

    // Retrieve the ID of the newly added user
    $userId = $this->db->lastInsertId();

    // Add the teacher to the 'teacher' table
    $query = "INSERT INTO teacher (user_id) VALUES (:user_id)";
    $this->db->query($query);
    $this->db->bind(':user_id', $userId);
    $this->db->execute();

    $teacherId = $this->db->lastInsertId();

    $query = "INSERT INTO course_teacher (course_id, teacher_id) VALUES (:course_id, :teacher_id)";
    $this->db->query($query);
    $this->db->bind(':course_id', $courseId);
    $this->db->bind(':teacher_id', $teacherId);
    $this->db->execute();


    $query = "SELECT * FROM {$this->table} WHERE role = 'teacher'";
    $this->db->query($query);
    $teachers = $this->db->fetchAll();

    return $teachers;
}

public function addStudent($email, $name, $password, $courseId)
{
    $hashedPassword = bcrypt($password);
    $role = 'student';

    // Add the user to the 'users' table
    $query = "INSERT INTO {$this->table} (name, email, password, role) VALUES (:name, :email, :password, :role)";
    $this->db->query($query);
    $this->db->bind(':name', $name);
    $this->db->bind(':email', $email);
    $this->db->bind(':password', $hashedPassword);
    $this->db->bind(':role', $role);
    $this->db->execute();

    // Retrieve the ID of the newly added user
    $userId = $this->db->lastInsertId();

    // Add the student to the 'student' table
    $query = "INSERT INTO student (user_id) VALUES (:user_id)";
    $this->db->query($query);
    $this->db->bind(':user_id', $userId);
    $this->db->execute();

    $studentId = $this->db->lastInsertId();

    $query = "INSERT INTO course_student (course_id, student_id) VALUES (:course_id, :student_id)";
    $this->db->query($query);
    $this->db->bind(':course_id', $courseId);
    $this->db->bind(':student_id', $studentId);
    $this->db->execute();

    $query = "SELECT * FROM {$this->table} WHERE role = 'student'";
    $this->db->query($query);
    $students = $this->db->fetchAll();

    return $students;

}

public function getAllStudents()
{
    $query = "SELECT * FROM {$this->table} WHERE role = 'student'";
    $this->db->query($query);
    $students = $this->db->fetchAll();

    return $students;

}

public function getAllTeachers()
{
    $query = "SELECT * FROM {$this->table} WHERE role = 'teacher'";
    $this->db->query($query);
    $teachers = $this->db->fetchAll();

    return $teachers;


}
}