<?php

/**
 * Router class 
 * 
 * Handling the request coming from the user
 * 
 */
class Router{
    
    /**
     * Current default controller
     *
     * @var {string}
     */
    protected $controller = 'HomeController';

    /**
     * Current default method
     *
     * @var {string}
     */
    protected $method = 'index';

    /**
     * Current default parameters
     *
     * @var {array}
     */
    protected $params = [];

    public function __construct(){
        // Getting url 
        $url = $this->getUrl();

        // Checking if url 0 index is set
        if(isset($url[0])){
            // if it is set checking controller execistance
            if(file_exists('../app/controllers/' .ucwords($url[0]). 'Controller'. '.php')){
                // Assigning current default controller to found controller
                $this->controller = ucwords($url[0]). 'Controller';
                // Unsetting 0 index in url
                unset($url[0]);
            }
        }

        // Requiring found controller
        require_once '../app/controllers/' .$this->controller. '.php';
        // Instantiating controller
        $this->controller = new $this->controller;


        // Checking if url 1 index excist
        if(isset($url[1])){
            // Checking if method excist in controller
            if(method_exists($this->controller, $url[1])){
                // Assigning method to current default method
                $this->method = $url[1];
                // Unsetting 1 index in url
                unset($url[1]);
            }
        }

        // Checking params and assigning them to params array
        if($url){
            $this->params = array_values($url);
        } else{
            $this->params = [];
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Return the url as array
     *
     * @return {array}
     */
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}