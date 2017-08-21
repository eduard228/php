
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
//echo "Обработчик формы";
//var_dump($_REQUEST);
$message =false;
if
(isset( $_REQUEST['name']) and isset($_REQUEST['phone']))
{   $name = $_REQUEST["name"];
    $phone = $_REQUEST["phone"];
    $row = 'Здравствуйте,' . $name .
        '  Ваш номер:' . $phone. PHP_EOL;
    file_put_contents('./contacts.txt', $row, FILE_APPEND);
    $message ='Спасибо, Мы с Вами свяжемся';
}
?>


<?php if ($message ) : ?>
<?= $message?>
<php else: ?>
<form action="index.php" method="post">
<p>Представтесь</p>
<input type="text" name="name">
<p> Укажите Ваш номер</p>
<input type="text" name="phone">
<button type="submit">Отправить</button>

</form>
    <?php endif; ?>
</body>
</html>
