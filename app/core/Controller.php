<?php

class Controller{
    public function view($view, $data = []){
        $folder = 'admin';
        require_once '../app/views/' . $folder . '/' . $view . '.php';
    }
    
    public function model($model){
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}
?>