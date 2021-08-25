<?php



class home extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function index($name = '', $otherName = '')
    {
        $user = $this->user;
        $infos = $this->user->get();
        $this->view('home/index', ['infos' => $infos]);
    }

    public function create()
    {
        $this->view('home/create');
    }

    public function checked()
    {
        foreach (array_keys($_POST['checked']) as $checked){
            $checked = User::findOrFail($checked);
            $checked->checked = 1;
            $checked->save();
        }

        return $this->Redirect('http://localhost/blog/public/home/index/', false);
    }
    public function store()
    {
        if(trim($_POST['email']) == ''){
            $_SESSION['error'] = 'Введите ваш email';
        }elseif(trim($_POST['username']) == ''){
            $_SESSION['error'] = 'Введите ваше имя';
        }elseif (trim($_POST['text']) == ''){
            $_SESSION['error'] = 'Введите текст задачи имя';
        }elseif (strlen($_POST['text']) < 15){
            $_SESSION['error'] = 'Минимальное длина слов не менее 15';
        }

        if(isset($_SESSION['error'])){
            return $this->create();
        }else{
            $success = User::create([
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'text' => trim($_POST['text'])
            ]);

            if($success){
                $_SESSION['success'] = 'Успешно';
                return $this->create();
            }
        }
    }
}