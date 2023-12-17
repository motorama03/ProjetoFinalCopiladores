<?php
    include 'C:\xampp\htdocs\bcc2023\Copiladores\LinguagensFormaisAutomatos-main\AnalisadorLexico\Tokens.php';

class AnalisadorLexico{
   private  $sigma = array('a','b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
   private $constantes = array(0,1,2,3,4,5,6,7,8,9);
   private $tokens = array() ;
   private $alpha = array(0,1,2,3,4,5,6,7,8,9,'a','b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z','%', '^','!','+','-','*','/','{','}','(',')','=',';','<','>');
   private $delta = array('q0'=>array("\n"=>'q60','$'=>'q73'," "=>'q60', '%'=>'q34', '^'=>'q33', '!'=>'q32', '+'=>'q19', '-'=>'q20', '*'=>'q21', '/'=>'q22', '{'=>'q17', '}'=>'q16', '('=>'q14', ')'=>'q15', 'a'=>'q1', 'b'=>'q1', 'c'=>'q74', 'd'=>'q40', 'e'=>'q36','f'=> 'q11', 'g'=>'q1', 'h'=>'q1','i'=>'q2', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q46', 'q'=>'q1', 'r'=>'q51', 's'=>'q41', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q6', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1',
                    '='=>'q23', ';'=>'q25', '<'=>'q26', '>'=>'q27', 0 => 'q4', 1 => 'q4', 2 => 'q4', 3 => 'q4', 4 => 'q4', 5 => 'q4', 6 => 'q4', 7 => 'q4', 8 => 'q4', 9 => 'q4'),
                    'q2'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q3', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q71', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q3'=>array('a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1', 'h'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q1'=>array(' '=>'q90',''=>'q90', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'f'=> 'q1', 'g'=>'q1', 'h'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q4'=>array( 0 => 'q4', 1 => 'q4', 2 => 'q4', 3 => 'q4', 4 => 'q4', 5 => 'q4', 6 => 'q4', 7 => 'q4', 8 => 'q4', 9 => 'q4', 'a'=>'q5', 'b'=>'q5', 'c'=>'q5', 'd'=>'q5', 'e'=>'q5', 'f'=> 'q5', 'g'=>'q5', 'h'=>'q5','i'=>'q5', 'j'=>'q5', 'k'=>'q5', 'l'=>'q5', 'm'=>'q5', 'n'=>'q5', 'o'=>'q5', 'p'=>'q5', 'q'=>'q5', 'r'=>'q5', 's'=>'q5', 't'=>'q5', 'u'=>'q5', 'v'=>'q5', 'w'=>'q5', 'x'=>'q5', 'y'=>'q5', 'z'=>'q5'),
                    'q5'=>array(0 => 'q5', 1 => 'q5', 2 => 'q5', 3 => 'q5', 5 => 'q5', 5 => 'q5', 6 => 'q5', 7 => 'q5', 8 => 'q5', 9 => 'q5', 'a'=>'q5', 'b'=>'q5', 'c'=>'q5', 'd'=>'q5', 'e'=>'q5', 'f'=> 'q5', 'g'=>'q5', 'h'=>'q5','i'=>'q5', 'j'=>'q5', 'k'=>'q5', 'l'=>'q5', 'm'=>'q5', 'n'=>'q5', 'o'=>'q5', 'p'=>'q5', 'q'=>'q5', 'r'=>'q5', 's'=>'q5', 't'=>'q5', 'u'=>'q5', 'v'=>'q5', 'w'=>'q5', 'x'=>'q5', 'y'=>'q5', 'z'=>'q5'),
                    'q6'=>array('h'=> 'q7', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q7'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q8', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q8'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q9', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q9'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q10','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q10'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q11'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q12', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q12'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q13', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q13'=>array('h'=> 'q1', 'a'=>'q1', 'b'=>'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q55','f'=> 'q1', 'g'=>'q1','i'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1'),
                    'q14'=>array(),
                    'q15'=>array(),
                    'q18'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q16'=>array(),
                    'q17'=>array(),
                    'q19'=>array('+'=>'q35'),
                    'q20'=>array('-'=>'q31'),
                    'q21'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    '='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '+'=>'q18', '-'=>'q18', '*'=>'q21', '/'=>'q18', 0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q22'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    '='=>'q18', '<'=>'q18', '>'=>'q18', '+'=>'q18', '-'=>'q18', '*'=>'q18', '/'=>'q22', 0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q23'=>array('='=>'q24'), 
                    'q24'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q25'=>array(),
                    'q26'=>array('='=>'q28', 'a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q27'=>array('='=>'q29', 'a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q28'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q29'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q30'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q31'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q32'=>array('>'=>'q35', 'a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q33'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q34'=>array('a'=>'q18', 'b'=>'q18', 'c'=>'q18', 'd'=>'q18', 'e'=>'q18','f'=> 'q18', 'g'=>'q18', 'h'=>'q18','i'=>'q18', 'j'=>'q18', 'k'=>'q18', 'l'=>'q18', 'm'=>'q18', 'n'=>'q18', 'o'=>'q18', 'p'=>'q18', 'q'=>'q18', 'r'=>'q18', 's'=>'q18', 't'=>'q18', 'u'=>'q18', 'v'=>'q18', 'w'=>'q18', 'x'=>'q18', 'y'=>'q18', 'z'=>'q18',
                    0 => 'q18', 1 => 'q18', 2 => 'q18', 3 => 'q18', 18 => 'q18', 5 => 'q18', 6 => 'q18', 7 => 'q18', 8 => 'q18', 9 => 'q18', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q35'=>array(),
                    'q36'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q37'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q38', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q38'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q39', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q39'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q40'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q41', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q41'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q42', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q42'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q43', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q43'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q44', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q44'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q45', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q45'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q46','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q46'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q47', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q47'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q48', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'p'=>'q1', 'q'=>'q1', 'o'=>'q61', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q48'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q49', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q49'=>array('t'=>'q50' ),
                    'q50'=>array(),
                    'q51'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q52', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q52'=>array('a'=>'q53', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q53'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q54', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q54'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q55'=>array('a'=>'q56', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q56'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q57', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q57'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q58','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q58'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1', 0 => 'q1', 1 => 'q1', 2 => 'q1', 3 => 'q1', 4 => 'q1', 5 => 'q1', 6 => 'q1', 7 => 'q1', 8 => 'q1', 9 => 'q1', '='=>'q18', '=='=>'q18', ';'=>'q18', '<'=>'q18', '>'=>'q18', '<='=>'18', '>='=>'q18'),
                    'q60'=>array(),
                    'q61'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q62', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q62'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q63', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q63'=>array('a'=>'q64', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q64'=>array('a'=>'q0', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q65', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q65'=>array('a'=>'q67', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q66'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q1', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q1', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q67'=>array(),
                    'q68'=>array('a'=>'q69', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q3', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q71', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q69'=>array('r'=>'q70', 'a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q3', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q71', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 's'=>'q1', 't'=>'q1', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q70'=>array(),
                    'q71'=>array('a'=>'q1', 'b'=>'q1','i'=> 'q1', 'c'=>'q1', 'd'=>'q1', 'e'=>'q1', 'g'=>'q1', 'h'=>'q1','f'=>'q3', 'j'=>'q1', 'k'=>'q1', 'l'=>'q1', 'm'=>'q1', 'n'=>'q71', 'o'=>'q1', 'p'=>'q1', 'q'=>'q1', 'r'=>'q1', 's'=>'q1', 't'=>'q72', 'u'=>'q1', 'v'=>'q1', 'w'=>'q1', 'x'=>'q1', 'y'=>'q1', 'z'=>'q1'),
                    'q72'=>array(),
                    'q73'=>array(),
                    'q74'=>array('h'=>'q68'),
                    'q90'=>array()
                );
    private $Q = array('q0', 'q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10', 'q11', 'q12', 'q13', 'q14', 'q15', 'q16', 'q17', 'q18',
                'q19', 'q20', 'q21', 'q22', 'q23', 'q24', 'q25', 'q26', 'q27', 'q28', 'q29', 'q30', 'q31', 'q32', 'q33', 'q34', 'q35', 'q36', 'q37', 'q38', 'q39',
                'q40', 'q41', 'q42', 'q43', 'q44', 'q45', 'q46', 'q47', 'q48', 'q49', 'q50', 'q51', 'q52', 'q53', 'q54', 'q55', 'q56', 'q57', 'q58', 'q59', 'q60',
                'q61', 'q62', 'q63', 'q64', 'q65', 'q66', 'q67', 'q68', 'q69', 'q70', 'q71', 'q72', 'q73', 'q90');
    private $finais = array('q1'=>'id', 'q2'=>'IF', 'q11'=>'id', 'q36'=>'id',
                'q12'=>'id', 'q3'=>'if', 'q6'=>'constante','q7'=>'constante', 'q8'=>'constante', 'q9'=>'constante', 'q10'=>'while', 'q13'=>'for', 'q14'=>'ap', 'q15'=>'fp',
                'q16'=>'fb', 'q17'=>'ab', 'q4'=>'Constante', 'q19'=>'mais', 'q20'=>'menos', 'q21'=>'operadordemultiplicacao', 'q22'=>'operadordedivisao',
                'q23'=>'operadordeatribuicao', 'q25'=>'pv', 'q26'=>'menor', 'q27'=>'maior', 'q30'=>'doisoperadoresdesoma concatenados', 'q24'=>'dois símbolos de igual juntos', 'q39'=>'else',
                'q33'=>'Elevado', 'q34'=>'Operador mod', 'q32'=>'Interrogação', 'q41'=>'do', 'q46'=>'switch', 'q50'=>'print',
                'q54'=>'READ','q58'=>'foreach','q60'=>'Espaço','q67'=>'programa', 'q70'=>'char', 'q72'=>'int', 'q73'=>'$');

    public function analisador($palavra){
        $posicaoI = 0;
        $posicaoF = -1;
        $this->q0 = 'q0';
        $naoPassou = false;
        $estado = $this->q0;
        $palavraConsumida = "";

        for($i = 0; $i < strlen($palavra); $i++){
            $posicaoF++;
            if($palavra[$i]==' '){
                continue;
            }
            if(array_key_exists($palavra[$i], $this->delta[$estado])){
                $palavraConsumida .= $palavra[$i];
                $estado = $this->delta[$estado][$palavra[$i]];
            }else{
                var_dump($palavra[$i]); //chr
                if(array_key_exists($estado, $this->finais)){
                    $token = new Tokens($this->finais[$estado], $posicaoI, $posicaoF, $palavraConsumida);
                    array_push($this->tokens,$token);
                    $estado = $this->q0;
                    $posicaoI = $posicaoF;
                    $i--;
                    $palavraConsumida = "";
                } else {            
                    echo("Erro no código, posição da frase (".$i.")");
                    $naoPassou = true;
                    $estado = $this->q0;
                    break;
                }
            }
        }
        if(array_key_exists($estado, $this->finais)){
            $token = new Tokens($this->finais[$estado], $posicaoI, $posicaoF, $palavraConsumida);
            $this->tokens[] = $token;
        }
        return $this->tokens;
    }
}

?>