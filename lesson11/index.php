<?php
$answers = [
    ['id' => 1, 'text' => 'hello'],
    ['id' => 2, 'text' => 'hello'],
    ['id' => 3, 'text' => 'hello'],
    ['id' => 4, 'text' => 'hello'],
    ['id' => 5, 'text' => 'hello'],
];

?>

<?php foreach ($answers as $answer) : ?>
<?php print_r($answer) ?>
Значение: <?php echo $answer[0][1][0] ?>
<?php endforeach; ?>
