<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TO-DO</title>
    <!--BOOTSTRAP style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!--BOOTSTRAP js-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
</head>
<body>
<?php if(!isset($_SESSION['authorized'])) { ?>
    <div class="container py-3">
        <?php require_once 'includes/header.php'?>
        <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
            <p><?=$_SESSION['error'];
                unset($_SESSION['error'])
                ?></p>
        <?php } ?>
            <div class="row">
                <form action="/blog/public/login/signIn/" method="POST" enctype="multipart/form-data">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="login" placeholder="name@example.com">
                        <label>Введите ваш логин</label>
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <label>Пароль</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Войти</button>
                </form>
            <div class="container py-3">
        <?php require_once 'includes/footer.php'?>
    </div>
<?php } else {?>
    <div class="container">
        <div class="row">
            <h1 style="text-align: center;">Вы уже вошли в систему</h1>
        </div>
    </div>
<?php }?>
</body>
</html>

