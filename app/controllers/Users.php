<?php 
class Users extends Controller{
    public function __construct(){
        $this->userModel = $this->model('User');    
    }

    public function index(){
        redirect('welcome');
    }

    public function register(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'This is register page',
                'login' => trim($_POST['login']),
                'password' => trim($_POST['password']),
                'password_conf' => trim($_POST['password_conf']),
                'login_err' => '',
                'password_err' => '',
                'password_conf_err' => ''
            ];

        // проверка на уникальность
        if(empty($data['login'])){
            $data['login_err'] = 'Пожалуйста введите логин.';
        } else {
            // проверка на уникальность
            if($this->userModel->checkLogin($data['login'])){
                $data['login_err'] = 'Этот логин уже занят.';
            }
        }

        if(empty($data['password'])){
            $data['password_err'] = 'Введите пожалуйста пароль';
        } elseif(mb_strlen($data['password']) < 6){
            $data['password_err'] = 'Пароль должен содержать минимум 6 символов.';
        }

        if(empty($data['password_conf'])){
            $data['password_conf_err'] = 'Повторите пароль.';     
          } else{
              if($data['password'] != $data['password_conf']){
                  $data['password_conf_err'] = 'Введенные пароли не совпадают.';
              }
          }




        // проверка ошибок 
        if(empty($data['login_err']) and empty($data['password_err']) and empty($data['password_conf_err'])){
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
            if($this->userModel->register($data)){
                flash('register_success', 'Вы зарегистрированны и можете войти.');
                redirect('users/login');
            } else {
                die('по какой то причине все сломалось и не работает :(');
            }
        } else {

            $this->view('users/register',$data);
        }
        } else {
            $data = [
                'login' => '',
                'password' => '',
                'password_conf' => '',
                'login_err' => '',
                'password_err' => '',
                'password_conf_err' => ''
            ];
            $this->view('users/register',$data);
        }
        
    }

    public function login(){
        if($this->isLoggedIn()){
            redirect('lists');
          }
          
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'login' => trim($_POST['login']),
                'password' => trim($_POST['password']),
                'login_err' => '',
                'password_err' => ''
            ];
            
            if(empty($data['login'])){
                $data['login_err'] = 'Пожалуйста введите логин.';
            }
            
            if($this->userModel->checkLogin($data['login'])){
                //юзер найден
            } else {
                //ошибка такого юзера не зарегистрированно
                $data['login_err'] == 'Логин не зарегистрирован.';
            }

            if(empty($data['login_err']) and empty($data['password_err'])){
            
                $loggedInUser = $this->userModel->login($data['login'],$data['password']);
                
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Пароль неверный';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'login' => '',
                'password' => '',
                'login_err' => '',
                'password_err' => ''
            ];
            
            $this->view('users/login', $data);
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_login']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }

    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_login'] = $user->login; 
        redirect('lists');
      }


}