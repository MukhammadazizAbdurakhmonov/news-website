<?php 
/**
 * UserController 
 * 
 * Giving permission to edit articles to users
 * Available to main admin
 */
class UserController extends Controller{

    private $userModel;

    public function __construct(){
        if(!$_SESSION['is_logged_in'] or $_SESSION['user_email'] != 'jasonmark4080370@gmail.com'){
            header('Location:'.URLROOT.'/admin/index');
        }
        $this->userModel = $this->model('User');
    }
    public function index(){
        $users = $this->userModel->getAllUsers();
        $data = [
            'users'=>$users
        ];

        $this->view('admin/users/index', $data);
    }

    public function editor($id){
        if($_SERVER['REQUEST_METHOD'] = 'POST'){
            $data = [
                'id'=>$id,
                'editor' => $_POST['editor']
            ];

            if(!isset($data['editor'])){
                $data['editor'] = 0;
            }
            if($this->userModel->editorPermission($data)){
                header('Location:'.URLROOT.'/user/index');
            }else{
                die('wrong');
            };
            
        }
    }
}