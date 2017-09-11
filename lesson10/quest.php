<?php
$question = '';
$answers = [];
$result = '';
$steps = [
    [
        'id' => 1,
        'question' => '1. Какого цвета нет в радуге?',
        'answers' => [
            [
                'text' => 'Красного',
                'function' => 'endGame',
            ],
            [
                'text' => 'Оранжего',
                'function' => 'endGame',
            ],
            [
                'text' => 'Коричнего',
                'function' => 'next',
                'next_step' => 2,
            ],
            [
                'text' => 'Зеленого',
                'function' => 'endGame',
            ],
        ],
    ],
    [
        'id' => 2,
        'question' => '2. Если смешать красную и синюю краски, какой получится цвет?',
        'answers' => [
            [
                'text' => 'Голубой',
                'function' => 'endGame',
            ],
            [
                'text' => 'Зеленный',
                'function' => 'endGame',
            ],
            [
                'text' => 'Оранжевый',
                'function' => 'endGame',
            ],
            [
                'text' => 'Фиолетовый',
                'function' => 'next',
                'next_step' => 3,
            ],
        ],
    ],
    [
        'id' => 3,
        'question' => '3. У кого из военных голубые береты?',
        'answers' => [
            [
                'text' => 'Десантники.',
                'function' => 'next',
                'next_step' => 4,
            ],
            [
                'text' => 'Танкисты.',
                'function' => 'endGame',
            ],
            [
                'text' => 'Моряки',
                'function' => 'endGame',
            ],
            [
                'text' => 'Летчики',
                'function' => 'endGame',
            ],
        ],
    ],
    [
        'id' => 4,
        'question' => '4. Какое растение не голубого цвета?',
        'answers' => [

            [
                'text' => 'Незабудка.',
                'function' => 'endGame',
            ],
            [
                'text' => 'Лютик.',
                'function' => 'next',
                'next_step' => 5,
            ],
            [
                'text' => 'Цикорий.',
                'function' => 'endGame',
            ],
            [
                'text' => 'Василек.',
                'function' => 'endGame',
            ],
        ],
    ],
    [
        'id' => 5,
        'question' => '5. Какого моря не бывает в мире?',
        'answers' => [
            [
                'text' => 'Красного.',
                'function' => 'endGame',
            ],
            [
                'text' => 'Белого.',
                'function' => 'endGame',
            ],
            [
                'text' => 'Синего.',
                'function' => 'next',
                'next_step' => 6,
            ],
            [
                'text' => 'Желтого.',
                'function' => 'endGame',
            ],
        ],
    ],
    [
        'id' => 6,
        'question' => 'Сколько глаз у мухи?',
        'answers' => [
            [
                'text' => '5',
                'function' => 'next',
                'next_step' => 7,
            ],
            [
                'text' => '2',
                'function' => 'endGame',
            ],
            [
                'text' => '3',
                'function' => 'endGame',
            ],
            [
                'text' => '1',
                'function' => 'endGame',
            ],
            [
                'text' => '4',
                'function' => 'endGame',
            ],
        ],
    ],[
        'id' => 7,
        'question' => 'Сколько дней курице нужно высиживать яйцо, чтобы вылупился цыпленок?',
        'answers' => [
            [
                'text' => '21',
                'function' => 'next',
                'next_step' => 'win',
            ],
            [
                'text' => '25',
                'function' => 'endGame',
            ],
        ],
    ],
];
function findNextStep($id, $steps) {
    $step = null; // создание переменной
    foreach ($steps as $_step) { // цикл
        if ($_step['id'] == $id) { // если id шага = желаемому
            $step = $_step; // запись в переменную
        }
    }
    return $step; // возвращаем переменную
}
function generateQuestion($step) {
    return $step['question']; // возвращаем вопрос у шага
}
function generateAnswers($step) {
    return $step['answers']; // возвращаем варианты ответов
}
if (isset($_POST['submit'])) {
    $answer = json_decode($_POST['answer'], true);
    if ($answer['function'] === 'next') {
        $step = findNextStep($answer['next_step'], $steps);
        $question = generateQuestion($step);
        $answers = generateAnswers($step);
    } else if ($answer['function'] === 'endGame') {
        $result = 'Вы проиграли';
    } else if ($answer['function'] === 'win') {
        $result = 'Ну, ты крутой';
    }
} else {
    $step = findNextStep(1, $steps);
    $question = generateQuestion($step);
    $answers = generateAnswers($step);
}