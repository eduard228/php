<?php


//print_r(get(3));


if (isset($_POST['submit'])) {
    add($_POST);
    echo 'Товар добавлен';
}
function delete($id){
    $elements = getAll();
    $row = $id -1;

    unset($elements[$row]);

    $row = [];
    foreach ($elements as $element){
        $rows[] = implode("\t" , $element);
    }
    $rows = implode(PHP_EOL, $rows);

    if ( ! strlen($rows)) $rows = '\t' . PHP_EOL;
    $result = file_put_contents('./products.csv' , $rows );
}

// Получение одной записи
function get($id)
{
    $row = $id - 1;
    if (isset(getAll()[$row])) {
        return getAll()[$row];
    }
    else {
        return false;
    }
}

// Получение всех записей
function getAll()
{
    $elements = [];
    foreach (file('./products.csv') as $row)
    {
        $element = explode("\t", $row);
        $elements[] = $element;
    }

    return $elements;
}

// Добавление в базу
function add($data)
{
    $title = $data['title'];
    $price = $data['price'];

    $row = $title . "\t" . $price . PHP_EOL;
    file_put_contents('./products.csv', $row, FILE_APPEND);
}