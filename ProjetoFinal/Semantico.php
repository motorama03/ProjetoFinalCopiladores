<?php

class AnalisadorSemantico {
    private $dados;
    private $tam;
    private $tabela_simbolos;

    public function __construct(array $dados) {
        $this->dados = $dados;
        $this->tabela_simbolos = [];
        $this->tam = count($dados);
    }

    public function analisar() {
        $varinicializada= [];
        $j = 0;
        for($i = 0; $i < $this->tam; $i++){
            //print_r($this->dados[$i]);
            if($this->dados[$i] == "int" || $this->dados[$i] == "char"){
                $varinicializada[$j] = $this->dados[$i+1];
                //echo($varinicializada);
                $j++;
            }
            //echo($j);
        }
        $arrayUnico = [];
        $pass = true;
        foreach ($varinicializada as $var) {
            if (!in_array($var, $arrayUnico)) {
            $arrayUnico[] = $var;
            } else {
            echo("var ".$var." ja iniciada, erro semantico");
            $pass = false;
            break;
            }
        }
        if($pass){
            echo('A analise semantica não encontrou nenhum problema!');
        }
    }
}

?>