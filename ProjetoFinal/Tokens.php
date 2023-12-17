<?php
class Tokens{
    public $name;
    public $Iposition;
    public $Fposition;
    public $lexema;

    public function __construct($name, $Iposition, $Fposition, $lexema) {
        $this->lexema = $lexema;
        $this->name = $name;
        $this->Iposition = $Iposition;
        $this->Fposition = $Fposition;
    }
    
    public function mostraTokens() {
        echo "$this->lexema ";
    }

    public function __toString(){
        $str = 'token: '.$this->name.' lexema: "'.$this->lexema.'"';
        $str .= ' Posição inicial: '.$this->Iposition.' posição final: '.$this->Fposition;
        return $str;
    }
}
?>
