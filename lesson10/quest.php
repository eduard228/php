<?php

$question = '';
$answers = [];
$result = '';




$steps = [
[
    'id' => 1,
    'question' => 'Что случилось с Игорем в повести "Слово о полку Игоре"' ,
    'answers' => [
        [
            'text' => 'Плен',
            'function' => 'next',
            'next_step' => 2,
        ],
        [
            'text' => 'Умер',
            'function' => 'endGame',


        ],


    ],

]  ,
    [
        'id' => 2,
        'question' => '(20,5 + 30,5)*2 =?' ,
        'answers' => [
            [
                'text' => '102',
                'function' => 'next',
                'next_step' => 3,
            ],
            [
                'text' => '100',
                'function' => 'endGame',


            ],


        ],

    ]  ,[
        'id' => 3,
        'question' => 'ПРИ-морский или ПРЕ-морский' ,
        'answers' => [
            [
                'text' => 'преморский',
                'function' => 'endGame',

            ],
            [
                'text' => 'приморский',
                'function' => 'win',


            ],


        ],

    ]  ,

];


function findNextStep($id, $steps){
    $step = null;
    foreach ($steps as $_step) {
        if ($_step['id'] == $id) {
            $step = $_step;
        }
    }
        return $step;
}

   function generateQuestion($step) {
    return $step['question'];
   }
   function generateAnswers($step){
       return $step['answers'];
   }
 if (isset($_POST['submit'])){
       $answer = json_decode($_POST['answer'],  true);
       print_r($answer);

     if ($answer['function'] === 'next') {
         print_r($answer);
         $step = findNextStep($answer['next_step'], $steps);
         $question =generateQuestion($step);
         $answers = generateAnswers($step);
     }else if ($answer['function'] === 'endGame') {
         $result = 'Н Е П Р А В И Л Ь Н О';
     }else if ($answer['function'] === 'win') {
             $result = 'М О Л О Д Е Ц';
       }
 } else {
     $step = findNextStep(1,$steps);
     $question =generateQuestion($step);
     $answers = generateAnswers($step);
 }