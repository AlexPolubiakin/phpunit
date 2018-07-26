<?php 
// Контроллер Pages

class Pages extends Controller {
    public function __construct(){

    }

    public function index(){
        $data = [
            'title' => 'Welcome this is index'
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'Welcome this is About'
        ];
        $this->view('pages/about', $data);
    }

    public function village(){
        $data = [
            'title' => 'Welcome this is Village'
        ];
        $this->view('pages/village', $data);
    }

    public function welcome(){
        $data = [
            'title' => 'Welcome this is welcome page'
        ];
        $this->view('pages/welcome', $data);
    }
}