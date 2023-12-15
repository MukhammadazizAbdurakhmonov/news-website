<?php

/**
 * AuthController
 * 
 * Login and register users
 * 
 */
class AuthController extends Controller{

    /**
     * User model
     *
     * @var [object]
     */
    private $userModel;

    /**
     * Construct fucntion
     * 
     * Loading usermodel
     */
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    /**
     * Register new users
     *
     * @return void
     */
    public function register(){
        /**
         * Handling submitted data through register form
         */
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'name'=>trim($_POST['name']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                'errors'=>[
                    'name_error'=> '',
                    'email_error'=>'',
                    'password_error'=> '',
                    'confirm_password_error'=>''
                ]
            ];

            if(empty($data['name'])){
                $data['errors']['name_error'] = 'Please enter your name';
            }

            if(empty($data['email'])){
                $data['errors']['email_error'] = 'Please enter your email';
            }

            if(!empty($this->userModel->findUserByEmail($data))){
                $data['errors']['email_error'] = 'Email already taken';
            }

            if(empty($data['password'])){
                $data['errors']['password_error'] = 'Please enter your password';
            }

            if(strlen($data['password']) < 6){
                $data['errors']['password_error'] = 'Please enter at least 6 characters';
            }

            if(empty($data['confirm_password'])){
                $data['errors']['confirm_password_error'] = 'Please repeat your password';
            }elseif($data['password'] != $data['confirm_password']){
                $data['errors']['confirm_password_error'] = 'Passwords do not match';
            }
            
            if(empty($data['errors']['name_error']) and 
                empty($data['errors']['email_error']) and 
                empty($data['errors']['password_error']) and 
                empty($data['errors']['confirm_password_error'])){
                
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $this->userModel->createUser($data);
                header('Location:'.URLROOT.'/auth/login');
                
            }else{
                $this->view('admin/users/register', $data);
            }
        }
        /**
         * Loading register form
         */
        $this->view('admin/users/register');
    }

    /**
     * Login excisting user
     *
     * @return void
     */
    public function login(){
        // Handle the submitted data through login form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $data = [
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'errors'=>[
                    'email_error'=>'',
                    'password_error'=> '',
                    'credentials'=>''
                ]
            ];

            if(empty($data['email'])){
                $data['errors']['email_error'] = 'Please enter your email';
            }

            if(empty($data['password'])){
                $data['errors']['password_error'] = 'Please enter your password';
            }

            $user = $this->userModel->findUserByEmail($data);

            if(empty($data['errors']['email_error']) and empty($data['errors']['password_error'])){
                if(!empty($user)){
                    if($user->email == $data['email'] and password_verify($data['password'], $user->password)){

                        $_SESSION['is_logged_in'] = true;
                        $_SESSION['user_id'] = $user->id;
                        $_SESSION['user_name'] = $user->name;
                        $_SESSION['user_email'] = $user->email;
                        $_SESSION['user_editor'] = $user->editor;
                        header('Location:'.URLROOT.'/admin/dashboard');
                    }else{
                        $data['errors']['credentials'] = 'Credentials are incorrect';
                        $this->view('admin/users/login', $data);
                    }
                }else{
                    $data['errors']['credentials'] = 'Credentials are incorrect';
                    $this->view('admin/users/login', $data);
                }
            }else{
                $this->view('admin/users/login', $data);
            } 
        }
        // Loading login form
        $this->view('admin/users/login');
    }

    public function logout(){


        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();

        header('Location:'.URLROOT.'/auth/login');
    }
}