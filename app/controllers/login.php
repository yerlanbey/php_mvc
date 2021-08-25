<?php

class login extends Controller {

    protected $admin;

    public function __construct()
    {
        $this->admin = $this->model('Admin');
    }


    public function index()
    {
        $this->view('home/login');
    }

    public function signIn()
    {
        session_start();
        $admin = $this->admin
            ->when(isset($_POST['login']) && isset($_POST['password']),
                function ($query){
                    $query->where('login', $_POST['login'])->where('password', $_POST['password']);
                })
            ->first();
        $login = $this->admin->where('login', $_POST['login'])->first();
        if($_POST['login'] == ''){
            $_SESSION['error'] = 'Введите ваш логин';
        }elseif ($_POST['password'] == ''){
            $_SESSION['error'] = 'Введите ваш пароль';
        }elseif ($login->password != $_POST['password']){
            $_SESSION['error'] = 'Не правильный пароль';
        }

        if(isset($_SESSION['error'])){
            return $this->index();
            unset($_SESSION['error']);
        }

        if(isset($admin)){
            $_SESSION['authorized'] = time();
            $_SESSION['success'] = 'Вы успешно вошли в свой аккаунт';
            return $this->Redirect('http://localhost/blog/public/home/index/', false);
        }
    }

    public function signOut()
    {
        session_start();
            unset($_SESSION['authorized']);
            unset($_SESSION['error']);
            unset($_SESSION['success']);
        return $this->Redirect('http://localhost/blog/public/home/index/', false);
    }
}