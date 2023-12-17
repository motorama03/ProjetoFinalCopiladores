<style>
    body{
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to right, rgb(255, 255, 255), rgb(122, 118, 118));
    text-align: center;
    }
    .Centroform{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .body{
        background-image: linear-gradient(rgb(244, 250, 244), rgb(146, 146, 146));
        text-align: center;
    }
    .box{
        position: absolute;
        top: 50%;
        left: 50%;
        background-color: rgb(255, 255, 255, 0.6);
        transform: translate(-50%, -50%);
        padding: 15px;
        width: 35%;
    }
    .inputbox{
        position: relative;
        text-align: center;
    }
    .errado{
        text-decoration: red;
    }
    .span-required{
        font-size: 12px;
        margin: 3px 0 0 1px;
        color: var(--color-red);
        display: none;
    }
</style>

<?php 
include 'C:\xampp\htdocs\bcc2023\Copiladores\LinguagensFormaisAutomatos-main\AnalisadorLexico\AnalisadorLexico.php';
include 'C:\xampp\htdocs\bcc2023\Copiladores\LinguagensFormaisAutomatos-main\AnalisadorLexico\SLR.php';
include 'C:\xampp\htdocs\bcc2023\Copiladores\LinguagensFormaisAutomatos-main\AnalisadorLexico\Semantico.php';


echo('<br><buton href="MainAutomatoLfa01.html">Digite outra palavra</a>');
$palavra = (isset($_POST['palavra'])?$_POST['palavra']:"");
$palavra = strtolower($palavra);
$dado;
$analisador = new AnalisadorLexico();
$tokens = $analisador->analisador($palavra);
$i = 0;
$dados;
$resultado = '';
echo('<form><H2>Tokens gerados:</H2><br>');
echo('<nav>');
foreach($tokens as $token){
    $dado[$i] = $token->name;
    if($token->lexema == 'id'){
        $token->lexema = $token->name;
        $resultado .= '<div>'.$token.'</div>';
        $dados[$i] = $token->lexema;
        $i++;
        continue;
    }
    $dados[$i] = $token->lexema;
    $resultado .= '<div>'.$token.'</div>';
    $i++;
}

echo('</nav>'.$resultado.'<br>');
echo('<H2>Saída analisador SLR</H2><br>');
echo('<div>Gramática LR<br>
EXP → EXP mais EXP2 | EXP2<br>
EXP2 → EXP2 menos EXP3 | EXP3<br>
EXP3 → id<br>
Folllow(EXP3): { $, menos, mais}<br>
Folllow(EXP2): { $, menos, mais}<br>
Folllow(EXP): { $, mais}</div><br>');
$first = $tokens[0]->name;
$dado[$i] = "$";

$SLR = new SLR();
$SLR = $SLR->parser($dado);

echo('<H2>Saída analisador Semantico</H2><br>');
$Semantico = new AnalisadorSemantico($dados);
$Semantico = $Semantico->analisar();

echo('<br><br><a href="MainAutomatoLfa01.html">Digitar outra palavra</a>');
?>