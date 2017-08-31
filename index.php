<?php

$message = false; //
$error = false; // Для ошибок

if (isset($_REQUEST['name']) and isset($_REQUEST['phone']) and isset($_REQUEST['surname']) and isset($_REQUEST['email'])) {

    $name = $_REQUEST['name']; // Для сокращения
    $surname = $_REQUEST['surname'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];


    if (empty($name) || empty($phone) or empty($surname) or empty($email)) {
        $error = '<strong>Заполните, пожалуйста поля</strong>';
    } else {
        $row = 'Здравствуйте, ' . $name . ' ' .
            $surname .
            '. Ваш номер: ' . $phone .
            '. Вам:' . ' лет' .
            '. Ваш email:' . $email .
            '.Ваш рассказ:' .  PHP_EOL;


// PHP_EOL = '\n'

    }

}

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h3>Анкета</h3>

    <?php if ($message) : ?>
        <p class="alert-success col-md-4"><?= $message ?></p>
    <?php else: ?>
        <form class="form-horizontal" action="index.php" method="post">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Имя</label>
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Имя" >
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Фамилия</label>
                <div class="col-md-4">
                    <input type="text" name="surname" class="form-control" placeholder="Фамилия" >
                </div>
            </div>

            <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Номер телефона</label>
                <div class="col-md-4">
                    <input type="phone" name="phone" class="form-control" placeholder="Введите номер" >
                </div>
            </div>



            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="email" >
                </div>
            </div>
<p>Возраст</p>
            <input type="number" name="age">
            <br>

<p1>О себе</p1> <br>
            <textarea name="about" id="about" cols="30" rows="10"></textarea> <br>

            <label for="interests1">Ваши интересы</label><br>
            <input type="checkbox" name = "interests1" value="comp">Техника<br>
            <input type="checkbox" name = "interests2" value="comp">Спорт<br>
            <input type="checkbox" name = "interests1" value="comp">Искусство<br>
            <input type="checkbox" name = "interests1" value="comp">Наука<br>
            <input type="checkbox" name = "interests1" value="comp">Автомобили<br>
            <br>
            <p>Пол</p>
            <input type="radio" name="gender" value="male"> Мужской
            <input type="radio" name="gender" value="female">Женский

            <div class="form-group">
                <div class="col-sm-offset-2 col-md-10">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
            <p class="alert-danger col-md-4"><?= $error ?></p>



        </form>
    <?php endif; ?>


</div>

</body>
</html>


<?php

function fieldIsset($field){
    if (isset($field) && empty($field)){
        return true;
    }
    return false;
}


