<?php

/**
 * Base controller
 *  
 * Loads model and view
 */
class Controller{

    /**
     * Loads model
     *
     * @param [string] $model
     * @return {new object of required model}
     */
    public function model($model){
        if(file_exists('../app/models/'. $model . '.php')){
            require_once '../app/models/' . $model . '.php';
            return new $model;
        } else{
            die('Model not found');
        }
    }

    /**
     * Loads view
     *
     * @param [type] $view
     * @param [type] $data
     * @return void
     */
    public function view($view, $data = null){
        if(file_exists('../app/views/'. $view . '.php')){
            require_once  '../app/views/' . $view . '.php';
        } else{
            die('View not found');
        }
    }
}