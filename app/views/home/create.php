
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
<div class="container py-3">
    <?php require 'includes/header.php'?>
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] != '') { ?>
        <p><?=$_SESSION['error']?></p>
    <?php }?>
    <form action="/blog/public/home/store/" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="mb-3">
                <label class="form-label">Электронная почта</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Полное имя: </label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Текс: </label>
                <textarea class="form-control" rows="3" name="text"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Отправить</button>
    </form>

    <?php require 'includes/footer.php'?>
</div>
</body>
</html>