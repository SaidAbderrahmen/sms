<?php

namespace App\Controller;

use App\Database\DB;
use App\Core\Session\Session;


class userController extends Controller {

	public function check()
	{   
         if(!Session::get('user')) {
       $this->view('auth/login');
    }
    elseif (Session::get('role') == 'admin'){
        $this->view('admin/index');
    }
    elseif (Session::get('role') == 'teacher'){
        $this->view('teacher/index');
    }
    elseif (Session::get('role') == 'student'){
        $this->view('student/index');
    }
        
	}

    public function index()
    {
        $students = $this->model('User')->getAllStudents();
        $teachers = $this->model('User')->getAllTeachers();
        $courses = $this->model('Course')->getAllCourses();
        $data = [
            'title' => 'Admin Dashboard',
            'students' => $students,
            'teachers' => $teachers,
            'courses' => $courses
        ];

        $this->view('admin/index',$data);
    }

    public function teachers()
    {
        $teachers = $this->model('User')->getAllTeachers();
        $data = [
            'title' => 'Teachers',
            'teachers' => $teachers
        ];

        $this->view('admin/teachers', $data);
    }

    public function students()
    {
        $students = $this->model('User')->getAllStudents();
        $data = [
            'title' => 'Students',
            'students' => $students
        ];

        $this->view('admin/students', $data);
    }

    public function courses()
    {
        $courses = $this->model('Course')->getAllCourses();
        $data = [
            'title' => 'Courses',
            'courses' => $courses
        ];

        $this->view('admin/courses', $data);
    }

	public function login()
	{
		$email = request('email');
		$password = request('password');
		$result = $this->model('User')->login($email, $password);
        if ($result) {
            if (Session::get('role') == 'admin'){
                $students = $this->model('User')->getAllStudents();
                $teachers = $this->model('User')->getAllTeachers();
                $courses = $this->model('Course')->getAllCourses();
                $data = [
                    'title' => 'Admin Dashboard',
                    'students' => $students,
                    'teachers' => $teachers,
                    'courses' => $courses
                ];
                $this->view('admin/index',$data);
            }
            elseif (Session::get('role') == 'teacher'){
                $this->view('teacher/index');
            }
            elseif (Session::get('role') == 'student'){
                $this->view('student/index');
            }
            
        } else {
            return $this->view('auth/login');
        }
	}

    public function addTeacher()
    {
        $courses = $this->model('Course')->getAllCourses();
        $data = [
            'title' => 'Add Teacher',
            'courses' => $courses
        ];
        return $this->view('admin/add_teacher', $data);
    }

    public function addStudent()
    {
        $courses = $this->model('Course')->getAllCourses();
        $data = [
            'title' => 'Add Student',
            'courses' => $courses
        ];
        return $this->view('admin/add_student', $data);
    }

    public function addCourse()
    {
        $data = [
            'title' => 'Add Course'
        ];
        return $this->view('admin/add_course', $data);
    }

    public function storeTeacher()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');
        $courseId = request('course_id');
        $data = $this->model('User')->addTeacher($name, $email, $password,$courseId );
        if ($data) {
            $data = [
                'title' => 'Teachers',
                'teachers' => $data
            ];
            return $this->view('admin/teachers',  $data);
        } else {
            $courses = $this->model('Course')->getAllCourses();
            return $this->view('admin/add_teacher', $courses);
        }
    }
    public function storeStudent()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');
        $courseId = request('course_id');
        $data = $this->model('User')->addStudent($name, $email, $password,$courseId );
        if ($data) {
            $data = [
                'title' => 'Students',
                'students' => $data
            ];
            return $this->view('admin/students',  $data);
        } else {
            $courses = $this->model('Course')->getAllCourses();
            $data = [
                'title' => 'Add Student',
                'courses' => $courses
            ];
            return $this->view('admin/add_student', $data);
        }
    }
    public function storeCourse()
    {
        $name = request('name');
        $data = $this->model('Course')->addCourse($name);
        if ($data) {
            $data = [
                'title' => 'Courses',
                'courses' => $data
            ];
            
            return $this->view('admin/courses',  $data);
        } else {
            return $this->view('admin/add_course');
        }
    }





}