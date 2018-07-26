<?php
class Lists extends Controller {
    
    public function __construct(){
        if(!isset($_SESSION['user_id'])){
            redirect('user/login');
        }   
        $this->wlistModel = $this->model('Wlist'); 
    }
    public function index(){
        $lists = $this->wlistModel->getLists();
        $data = [
            'lists' => $lists
        ];
        $this->view('lists/index', $data);
    }
    public function add(){
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'list_name' => trim($_POST['list_name']),
                'list_desc' => trim($_POST['list_desc']),
                'author_name' => $_SESSION['user_login'],
                'author_id' => $_SESSION['user_id'],
                'list_name_err' => '',
                'list_desc_err' => ''
            ];

            if(empty($data['list_name'])){
                $data['list_name_err'] = 'Пожалуйста введите название';
            } 

            if(empty($data['list_desc'])){
                $data['list_desc_err'] = 'Пожалуйста введите описание';
            }

            if(empty($data['list_name_err']) and empty($data['list_desc_err'])){
                if($this->wlistModel->addList($data)){
                    flash('post_success', 'Пост добавлен.');
                    redirect('lists/add');
                } else {
                    die('что то пошло не так! :(');
                }
            } else {
                $myLists = $this->wlistModel->getMyLists($_SESSION['user_id']);
                $data['myLists'] = $myLists;
                $this->view('lists/add', $data);
            }
        } else {
            $myLists = $this->wlistModel->getMyLists($_SESSION['user_id']);
            $data = [
            'list_name' => '',
            'list_desc' => '',
            'list_name_err' => '',
            'list_desc_err' => '',
            'myLists' => $myLists
            ];
            $this->view('lists/add', $data);
        }
        
    }
    public function del($id){
         if($this->wlistModel->deleteList($id)){
            redirect('lists/add');
         } else {
             die ('Что то пошло не так :(');
         }
    }

    public function show($id1){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'item' => trim($_POST['item']),
                'list_id' => trim($id1),
                'item_err' => ''
            ];
            if(empty($data['item'])){
                $data['item_err'] = 'Пожалуйста введите значение';
            } 
            if(empty($data['item_err'])){
                if($this->wlistModel->addItem($data)){
                    flash('post_success', 'Пункт добавлен');
                    redirect('lists/show/'.$id1);
                } else {
                    die('что то пошло не так! :(');
                }
            }
        }

            $list = $this->wlistModel->showList($id1);
            $data = [
                'list' => $list,
                'item' => ''
            ];
            $this->view('lists/show', $data);
    } 

    public function delitem($id1,$id2){
        if($this->wlistModel->deleteItem($id2)){
            redirect('lists/show/' . $id1);
        } else {
            die('Все пропало шеф!');
        }
    }

    public function checkItem($id1,$id2){
        if($this->wlistModel->checkItem($id2)){
            redirect('lists/show/' . $id1);
        } else {
            
            die('Все пропало шеф!');
        }
    }

    
}