<?php

class Users extends Controller {
    public function __construct()
    {
        $this->userModel = $this->Model('User');
    }

    public function register() {
        // Check for POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process the Form

        // Snaitize POST request

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        //Validate Name
        if(empty($data['name'])){
            $data['name_err'] = 'Please enter your Name';
        }

        //Validate Email
        if(empty($data['email'])){
            $data['email_err'] = 'Please enter your Email';
        } else{
            // Check if email Exist
            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email is Already Taken';
            }
        }

        //Validate Password
        if(empty($data['password'])){
            $data['password_err'] = 'Please enter your Password';
        } elseif(strlen($data['password']) < 6){
            $data['password_err'] = 'Password Must be at least 6 characters';
        }

        //Validate confirm Password
        if(empty($data['confirm_password'])){
            $data['confirm_password_err'] = 'Please confirm Password';
        } else{
            if($data['password'] != $data['confirm_password']){
                $data['confirm_password_err'] = 'Passwords do not match';
            }
        }

        //Make sure there is no error before we validate
        if(empty($data['name_err']) && empty($data['password_err']) && empty($data['email_err']) && empty($data['confirm_password_err'])){
            //Validate
            
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            // register User
            if($this->userModel->register($data)){
                flash('register_success', 'You are Registered and can log in');
                redirect('users/login');
            } else{
                die('Something went wrong');
            }

        } else{
            //Load View With errors

            $this->View('Users/register', $data);
        }

       
        } else {
            // Init Data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Load View
            $this->View('Users/Register', $data);
        }
    }

    public function Login() {
        // Check for POST request

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process the Form

            // Snaitize POST request

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            $data = [
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'email_err' => '',
            'password_err' => ''
            ];

                //Validate Email
            if(empty($data['email'])){
                $data['email_err'] = 'Please enter your Email';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_err'] = 'Please enter your Password';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password Must be at least 6 characters';
            }

            //Make sure there is no error before we Login
            if(empty($data['email_err']) && empty($data['password_err'])){
                //Validate
                die('Login');
            } else{
                //Load View With errors
    
                $this->View('Users/Login', $data);
            }

        } else {
            // Init Data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load View
            $this->View('Users/Login', $data);
        }
    }
}