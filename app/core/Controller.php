<?php
class Controller
{
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        return new $model();
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/'. $view .'.php';
    }

    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    }
}