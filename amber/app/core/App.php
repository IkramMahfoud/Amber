<?php
/*_____________________________________________________________
 ***** url = controller/method/param[]
 ______________________________________________________________
 ***** App class
 ______________________________________________________________
 ***** routing class
 _____________________________________________________________*/

class App
{
    private $Controller = 'home';
    private $method = 'index';
    private $param = [];

    
    public function getUrl()
    {

        if (isset($_GET['url'])) {

            $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            return $url;
        }
    }

    public function __construct()
    {

        $url = $this->getUrl();
        if (isset($url[0])) {
            if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
                $this->Controller = ucwords($url[0]);
                unset($url[0]);
            }
        }
        //require the controller
        require_once '../app/controllers/' . $this->Controller . '.php';

        //instantiation of controller
        $this->Controller = new $this->Controller;

        if (isset($url[1])) {
            if (method_exists($this->Controller,   $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        // if(isset($url[2])){
        //     $this->param = array_values($url);
        // }else{
        //     $this->param =  [];
        // }

        
        $this->param = $url ? array_values($url) : []; //ternary operator
        //call the function
        call_user_func_array([$this->Controller, $this->method], $this->param);

    }
    
}
