<?php 
/**
 * Основной контроллер
 * загужает model и view
 */
class Controller {
    // Загружает model
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        // возвращение инициализированной модели 
        return new $model();

    }   
    // Загружает view
    public function view($view,$data =[]){
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            echo '../app/views/' . $view . '.php';
            die('Error: file not exist');
        }
    }
}