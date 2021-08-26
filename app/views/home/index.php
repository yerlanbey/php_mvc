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
<?php
$result_for_page = 3;
$count = $data['infos']->count();
$number_of_pages = ceil($count/$result_for_page);

if (!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}
$this_page_first_result = ($page - 1) * $result_for_page;

$records = $data['infos']->skip($this_page_first_result)->take($result_for_page);
?>
<div class="container py-3">
    <?php require 'includes/header.php'?>
    <div class="list-group list-group-checkable">
        <?php if(isset($_SESSION['success']) && $_SESSION['success'] != '') { ?>
            <p><?=$_SESSION['success'];unset($_SESSION['success'])
                ?></p>
        <?php }?>
        <?php if (isset($_SESSION['authorized'])){?>
            <form action="/blog/public/home/checked/" method="POST" enctype="multipart/form-data">
        <?php } ?>
        <?php foreach ($records as $info) {?>
                    <label class="list-group-item py-3" style="margin-bottom: 20px; border: 2px solid dimgray; border-radius: 10px">
                        <?php if ($info->checked == 1){?>
                            <span class="badge bg-primary">Проверена</span>
                        <?php } ?>
                        <h4><?=$info->username?></h4>
                        <span class="d-block small opacity-50" style="color: blue; font-weight: bold"><?=$info->text?></span>
                        <?php if ($info->checked != 1 && isset($_SESSION['authorized'])){?>
                            <input type="checkbox" class="form-check-input" name="checked[<?=$info->id?>]">
                            <label class="form-check-label">Сделать</label>
                        <?php } ?>
                    </label>
        <?php } ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($page = 1; $page <= $number_of_pages; $page++){?>
                            <li class="page-item"><a class="page-link" href="/blog/public/home/index?page=<?=$page?>" ><?=$page?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
        <?php if (isset($_SESSION['authorized'])){?>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        <?php } ?>
    </div>
    <?php require 'includes/footer.php'?>
</div>
</body>
</html>