<?php 
/**
 * Класс Route 
 * Берет URL и перенаправляет
 * формат
 * URL FORMAT - /controller/method/params
 */

 class Route {
     // устанавливаем значения контроллера и метода контроллера по умолчанию
     protected $currentController = 'Pages';
     protected $currentMethod = 'index';
     protected $params = [];

     public function __construct(){ 
         // разбиваем ссылку в массив
        $url = $this->getUrl();
        //проверка первого значения массива и назначение контроллера
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            // назначение контроллера
            $this->currentController = ucwords($url[0]);
            // обнуление значения 
            unset($url[0]);
        }
        require_once '../app/controllers/' . $this->currentController . '.php';
        // создаем экземпляр класса
        $this->currentController = new $this->currentController;
        // загрузка метода
        if(isset($url[1])){
            //проверка наличия метода
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }
        // получаем параметры
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);
         
     }
    // разбивает текущую строку url на массив
     public function getUrl(){
         if(isset($_GET['url'])){
             $url = rtrim($_GET['url'], '/');
             $url = filter_var($url, FILTER_SANITIZE_URL);
             $url = explode('/' , $url);
             return $url;
         }
     }
 }