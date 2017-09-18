<?php
$question = '';
$answers = [];
$result = '';
$image = '';

$steps = [
    [
        'id' => 1,
        'image' =>'./img/king1.jpg',
        'question' => 'Вы заходите в покои Короля. <br> Король:<br>- Приветствую тебя, герой! Держава в опасности. Долго объяснять, иди убей дракона. Вот тебе на руки платежное поручение на 1000 золотых! Произведи закупку у единственного поставщика, оприходуй товар, правильно заполни документацию и стремительно отправляйся в бой пока не поздно!<br> Ваш ответ:',
        'answers' => [
            [
                'text' => 'Согласен',
                'function' => 'next',
                'next_step' => 2,

            ],
            [
                'text' => 'Нет',
                'function' => 'endGame',
            ]
        ]
    ],
    [
        'id' => 2,
        'image' =>'./img/lavka2.jpg',
        'question' => '- Согласен! Но вместо бумажки - золото. Деньги вперед. Затем накажем ящерицу, А бумажками пусть займутся делопроизводители. <br> Король согласился. Вы удалились прочь, совершая несколько реверансов, нескрывающих Вашей радости. В своей голове Вы уже решили ограничется покупкой оружия ближнего боя, так как с остальной экипировкой у Вас порядок. Ну а деньги раздать сиротам (нет). <br> Вы зашли в рекомендованную королевством лавку, в которой  обнаружили три придмета в отделе "Ближнего боя".<br> Что вы выберете?',
        'answers' => [
            [
                'text' => 'Ничего',
                'function' => 'endGame',

            ],
            [
                'text' => 'Мяч',
                'function' => 'endGame',
            ],
            [
                'text' => 'Меч',
                'function' => 'next',
                'next_step' => 3,
            ]
        ]
    ],
    [
        'id' => 3,
        'image' =>'./img/avatar3.jpg',
        'question' => 'Ну конечно же меч! <br> Пойдем убивать дракона?',
        'answers' => [
            [
                'text' => 'Нет',
                'function' => 'endGame',
            ],
            [
                'text' => 'Да',
                'function' => 'win',
            ],

        ],

    ],

];

function findNextStep($id, $steps)
{
    $step = null; //создание переменной
    foreach ($steps as $_step) { //цикл
        if ($_step['id'] == $id) { // если id шага равно желаемому
            $step = $_step; // запись в переменную
        }
    }
    return $step;
}

;

function generateQuestion($step)
{
    return $step['question']; //возврат вопроса шага
}

function generateImage($step)
{
    return $step['image']; //возврат вопроса шага
}

function generateAnswers($step)
{
    return $step['answers']; //возврат вариантов шага
}

if (isset($_POST['submit'])) {
    $answer = json_decode($_POST['answer'], true);
    if ($answer['function'] === 'next'){
        $step = findNextStep($answer['next_step'], $steps);
        $question = generateQuestion($step);
        $answers = generateAnswers($step);
        $image = generateImage($step);
    } else if ($answer['function'] === 'endGame'){
        $result = 'Вы проиграли';
    } else if ($answer['function'] === 'win'){
        $result = 'Вы выиграли';
    }

} else {
    $step = findNextStep(1, $steps);
    $question = generateQuestion($step);
    $answers = generateAnswers($step);
}