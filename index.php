


<?php
//echo "Обработчик формы";
//var_dump($_REQUEST);
$message =false;
$error =false;
if (isset( $_REQUEST['name']) and isset($_REQUEST['phone']))

{   $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    if( empty($name)  or empty($phone)) {

    } else{
        $row = 'Здравствуйте,' . $name .
            '  Ваш номер:' . $phone. PHP_EOL;
        file_put_contents('./contacts.txt',
            $row, FILE_APPEND);

        $message ='Спасибо, Мы с Вами свяжемся';
    }
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./Css/bootstrap.min.css"
</head>
<body>
<div class="container"
     <h1>Форма обратной связи</h1>
<?php if ($message ) : ?>
<?= $message?>
<?php else: ?>
    <form class="form-horizontal" role="form">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label">ФИО</label>
            <div class="col-sm-4">
                <input type="text" name="name" class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-4 control-label">Номер телефона</label>
            <div class="col-md-4">
                <input type="password" name="phone" class="form-control" ">
            </div>
        </div>
        <!--    <div class="form-group">-->
        <!--        <div class="col-sm-offset-2 col-sm-10">-->
        <!--            <div class="checkbox">-->
        <!--                <label>-->
        <!--                    <input type="checkbox"> Запомнить меня-->
        <!--                </label>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--    <div class="form-group">-->
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="alert-danger">Отправить</button>
        </div>
        </div>
        <p class="alert-danger col-md-4"><?= $error ?></p>
    </form>
<?php endif; ?>
</body>
</html>
