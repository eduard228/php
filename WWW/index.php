<?php

    require './quest.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Победи дракона</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body background="img/Fantasy_Fight_with_a_dragon_021617_.jpg">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="bg-info" >
            <div class="btn-default">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="home.php">Игры</a>
                <a class="navbar-brand" href="index1.php">Чат</a>
            </div>
        </div>
    </div>
</nav>
<br>

<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <img src="<?= $step['image'] ?>" class="img-thumbnail">
        </div>


        <div class="col-sm-10">
            <?=$question ?>

        </div>
    </div>

</div>



<form action="index.php" method="post">
    <div class="container">

        <div class="row btn-group-vertical col-sm-12">
            <?php foreach ($answers as $answer) : ?>
            <label class="btn bg-danger  btn-default btn-block">
                <input
                    type="radio"
                    name="answer"
                    value=<?=json_encode($answer) ?>
                >

                <?= $answer['text']; ?>
            </label>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
        <input type="submit" class="btn btn-primary" name="submit" value="Отправить">
    </div>
    <div class="container">
        <?=$result ?>

    </div>

</form>
</body>
</html>