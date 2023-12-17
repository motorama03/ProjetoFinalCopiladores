<?php
/***
 * Gramática LR
 * EXP → EXP mais EXP2 | EXP2
 * EXP2 → EXP2 menos EXP3 | EXP3
 * EXP3 → id
 * Folllow(EXP3): { $, menos, mais}
 * Folllow(EXP2): { $, menos, mais}
 * Folllow(EXP): { $, mais}
 * 
 * // Nova gramática:
 * & = vazio
 * IF' -> if
 * IF -> if (EXP):{EXP}
 * EXP -> id|const|&
 * 
 */

define('NAO_TERMINAL',[0=>'TIPO',
                        1=>'PAR',
                        2=>'LISTA_PAR',
                        3=>'COMANDOS',
                        4=>'COMANDO',
                        5=>'ATT',
                        6=>'PROG',
                        7=>'EXP',
                        8=>'EXP2',
                        9=>'EXP3']);

class SLR{
    private $afd;

        public function __construct(){
            $this->afd = array(
                0=>['ACTION'=>['programa'=>'S 2'],'GOTO'=>[6=>['$'=>1]]], 
                1 => ['ACTION' => ['$' => 'ACC '], 'GOTO' => []],
                2 => ['ACTION' => ['id' => 'S 3'], 'GOTO' => []],
                3 => ['ACTION' => ['ap' => 'S 4'], 'GOTO' => []],
                4 => ['ACTION' => ['int' => 'S 5', 'char' => 'S 6', 'num' => 'S 7', 'fp' => 'R 0 2'], 'GOTO' => [0 => ['id' => 8], 1 => ['v' => 10, 'fp' => 10, 'pv' => 10], 2 => ['v' => 13, 'fp' => 15]]],
                5 => ['ACTION' => ['id' => 'R 1 0'], 'GOTO' => []],
                6 => ['ACTION' => ['id' => 'R 1 0'], 'GOTO' => []],
                7 => ['ACTION' => ['id' => 'R 1 0'], 'GOTO' => []],
                8 => ['ACTION' => ['id' => 'S 9'], 'GOTO' => []],
                9 => ['ACTION' => ['pv' => 'R 2 1', 'fp' => 'R 2 1', 'operadordeatribuicao' => 'R 2 1'], 'GOTO' => []],
                10 => ['ACTION' => ['fp' => 'R 1 2', 'v' => 'R 1 2'], 'GOTO' => []],
                11=>['ACTION'=>['fp'=>'R 3 2','v'=>'R 3 2'],'GOTO'=>[]],
                12=>['ACTION'=>['pv'=>'S 37'],'GOTO'=>[]],
                13=>['ACTION'=>['v'=>'S 14'],'GOTO'=>[]],
                14=>['ACTION'=>['int'=>'S 17','char'=>'S 6','num'=>'S 7', 'id'=>'S 24'],'GOTO'=>[0=>['id'=>8],2=>['v'=>11,'pv'=>11],8=>['menos'=>20],9=>['']]],
                15=>['ACTION'=>['fp'=>'S 16'],'GOTO'=>[]],
                16=>['ACTION'=>['ab'=>'S 17'],'GOTO'=>[]],
                17=>['ACTION'=>['id'=>'S 18','int'=>'S 5','char'=>'S 6','num'=>'S 7','ap'=>'S 21'],'GOTO'=>[0=>['id'=>8],1=>['v'=>12,'fp'=>12,'pv'=>12,'operadordeatribuicao'=>18],4=>['id'=>36,'fb'=>36,'int'=>36,'char'=>36,'num'=>36],5=>['pv'=>39],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],3=>['fb'=>32,'int'=>34,'char'=>34,'num'=>34,'id'=>34],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>38,'pv'=>38]]],
                18=>['ACTION'=>['operadordeatribuicao'=>'S 19','pv'=>'R 1 5'],'GOTO'=>[]],
                19=>['ACTION'=>['id'=>'S 20','ap'=>'S 21', 'int'=>'S 21'],'GOTO'=>[2=>['fp'=>31],5=>['pv'=>38],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>38,'pv'=>38]]],
                20=>['ACTION'=>['fp'=>'R 1 9','pv'=>'R 1 9','mais'=>'R 1 9','menos'=>'S 14'],'GOTO'=>[]],
                21=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[2=>['fp'=>22],5=>['pv'=>24],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>22,'pv'=>22]]],
                22=>['ACTION'=>['fp'=>'S 23'],'GOTO'=>[]],
                23=>['ACTION'=>['fp'=>'R 3 9','pv'=>'R 3 9','mais'=>'R 3 9','menos'=>'R 3 9'],'GOTO'=>[]],
                24=>['ACTION'=>['fp'=>'R 1 8','pv'=>'R 1 8','mais'=>'R 1 8','menos'=>'R 1 8'],'GOTO'=>[]],
                25=>['ACTION'=>['mais'=>'S 26'],'GOTO'=>[]],
                26=>['ACTION'=>['id'=>'S 20','ap'=>'S 21', 'int'=>'S 14'],'GOTO'=>[0=>['menos'=>29],2=>['fp'=>27],8=>['menos'=>29,'fp'=>27,'pv'=>27],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24]]],
                27=>['ACTION'=>['fp'=>'R 3 7','pv'=>'R 3 7','mais'=>'R 3 7'],'GOTO'=>[]],
                28=>['ACTION'=>['fp'=>'R 1 7','pv'=>'R 1 7','mais'=>'R 1 7'],'GOTO'=>[]],
                29=>['ACTION'=>['menos'=>'S 30'],'GOTO'=>[]],
                30=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[9=>['mais'=>31,'menos'=>31,'fp'=>31,'pv'=>31]]],
                31=>['ACTION'=>['fp'=>'R 3 8','pv'=>'R 3 8','mais'=>'R 3 8','menos'=>'R 3 8'],'GOTO'=>[]],
                32=>['ACTION'=>['fb'=>'S 33', 'if'=>'S 41'],'GOTO'=>[]],
                33=>['ACTION'=>['$'=>'R 17 6'],'GOTO'=>[]],
                34=>['ACTION'=>['id'=>'S 18','int'=>'S 5','char'=>'S 6','num'=>'S 7'],'GOTO'=>[0=>['id'=>35],2=>['v'=>11,'pv'=>11]]],
                35=>['ACTION'=>['id'=>'R 2 3','int'=>'R 2 3','char'=>'R 2 3','num'=>'R 2 3','fb'=>'R 2 3'],'GOTO'=>[]],
                36=>['ACTION'=>['id'=>'R 1 3','int'=>'R 1 3','char'=>'R 1 3','num'=>'R 1 3','fb'=>'R 1 3'],'GOTO'=>[]],
                37=>['ACTION'=>['id'=>'R 2 4','int'=>'R 2 4','char'=>'R 2 4','num'=>'R 2 4','fb'=>'R 2 4'],'GOTO'=>[]],
                38=>['ACTION'=>['pv'=>'R 3 5'],'GOTO'=>[]],
                39=>['ACTION'=>['pv'=>'S 39', 'print'=>'S 41'],'GOTO'=>[]],
                40=>['ACTION'=>['id'=>'R 2 4','int'=>'R 2 4','char'=>'R 2 4','num'=>'R 2 4','fb'=>'R 2 4'],'GOTO'=>[]],
                41=>['ACTION'=>['ap'=>'S 42','fp'=>'S 44']],
                42=>['ACTION'=>['id'=>'S 41', 'fb'=>'S 33']],
                43=>['ACTION'=>['fb'=>'R 7 4']],
                44=>['ACTION'=>['pv'=>'S 43']]
            );
            
        }

            /*$this->afd = array(
                0=>['ACTION'=>['programa'=>'S 2'],'GOTO'=>[6=>['$'=>1]]], 
                1=>['ACTION'=>['$'=>'ACC '],'GOTO'=>[]],
                2=>['ACTION'=>['id'=>'S 3'],'GOTO'=>[]], 
                3=>['ACTION'=>['ap'=>'S 4'],'GOTO'=>[]],
                4=>['ACTION'=>['int'=>'S 5','char'=>'S 6', 'num'=>'S 7','fp'=>'R 0 2'],'GOTO'=>[0=>['id'=>8],1=>['v'=>10,'fp'=>10,'pv'=>10],2=>['v'=>13,'fp'=>15]]],
                5=>['ACTION'=>['id'=>'R 1 0'],'GOTO'=>[]],
                6=>['ACTION'=>['id'=>'R 1 0'],'GOTO'=>[]],
                7=>['ACTION'=>['id'=>'R 1 0'],'GOTO'=>[]],
                8=>['ACTION'=>['id'=>'S 9'],'GOTO'=>[]],
                9=>['ACTION'=>['pv'=>'R 2 1','fp'=>'R 2 1','v'=>'R 2 1'],'GOTO'=>[]],
                10=>['ACTION'=>['fp'=>'R 1 2','v'=>'R 1 2'],'GOTO'=>[]],
                11=>['ACTION'=>['fp'=>'R 3 2','v'=>'R 3 2'],'GOTO'=>[]],
                12=>['ACTION'=>['pv'=>'S 37'],'GOTO'=>[]],
                13=>['ACTION'=>['v'=>'S 14'],'GOTO'=>[]],
                14=>['ACTION'=>['int'=>'S 5','char'=>'S 6','num'=>'S 7'],'GOTO'=>[0=>['id'=>8],2=>['v'=>11,'pv'=>11]]],
                15=>['ACTION'=>['fp'=>'S 16'],'GOTO'=>[]],
                16=>['ACTION'=>['ab'=>'S 17'],'GOTO'=>[]],
                17=>['ACTION'=>['id'=>'S 18','int'=>'S 5','char'=>'S 6','num'=>'S 7','ap'=>'S 21'],'GOTO'=>[0=>['id'=>8],1=>['v'=>12,'fp'=>12,'pv'=>12],4=>['id'=>36,'fb'=>36,'int'=>36,'char'=>36,'num'=>36],5=>['pv'=>39],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],3=>['fb'=>32,'int'=>34,'char'=>34,'num'=>34,'id'=>34],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>38,'pv'=>38]]],
                18=>['ACTION'=>['operadordeatribuicao'=>'S 19','pv'=>'S 2'],'GOTO'=>[]],
                19=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[2=>['fp'=>31],5=>['pv'=>38],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>38,'pv'=>38]]],
                20=>['ACTION'=>['fp'=>'R 1 9','pv'=>'R 1 9','mais'=>'R 1 9','menos'=>'R 1 9'],'GOTO'=>[]],
                21=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[2=>['fp'=>22],5=>['pv'=>24],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24],8=>['mais'=>28,'menos'=>29,'fp'=>28,'pv'=>28],7=>['mais'=>25,'fp'=>22,'pv'=>22]]],
                22=>['ACTION'=>['fp'=>'S 23'],'GOTO'=>[]],
                23=>['ACTION'=>['fp'=>'R 3 9','pv'=>'R 3 9','mais'=>'R 3 9','menos'=>'R 3 9'],'GOTO'=>[]],
                24=>['ACTION'=>['fp'=>'R 1 8','pv'=>'R 1 8','mais'=>'R 1 8','menos'=>'R 1 8'],'GOTO'=>[]],
                25=>['ACTION'=>['mais'=>'S 26'],'GOTO'=>[]],
                26=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[2=>['fp'=>27],8=>['menos'=>29,'fp'=>27,'pv'=>27],9=>['mais'=>24,'menos'=>24,'fp'=>24,'pv'=>24]]],
                27=>['ACTION'=>['fp'=>'R 3 7','pv'=>'R 3 7','mais'=>'R 3 7'],'GOTO'=>[]],
                28=>['ACTION'=>['fp'=>'R 1 7','pv'=>'R 1 7','mais'=>'R 1 7'],'GOTO'=>[]],
                29=>['ACTION'=>['menos'=>'S 30'],'GOTO'=>[]],
                30=>['ACTION'=>['id'=>'S 20','ap'=>'S 21'],'GOTO'=>[9=>['mais'=>31,'menos'=>31,'fp'=>31,'pv'=>31]]],
                31=>['ACTION'=>['fp'=>'R 3 8','pv'=>'R 3 8','mais'=>'R 3 8','menos'=>'R 3 8'],'GOTO'=>[]],
                32=>['ACTION'=>['fb'=>'S 33', 'if'=>'S 41'],'GOTO'=>[]],
                33=>['ACTION'=>['$'=>'R 8 6'],'GOTO'=>[]],
                34=>['ACTION'=>['id'=>'S 18','int'=>'S 5','char'=>'S 6','num'=>'S 7'],'GOTO'=>[0=>['id'=>35],2=>['v'=>11,'pv'=>11]]],
                35=>['ACTION'=>['id'=>'R 2 3','int'=>'R 2 3','char'=>'R 2 3','num'=>'R 2 3','fb'=>'R 2 3'],'GOTO'=>[]],
                36=>['ACTION'=>['id'=>'R 1 3','int'=>'R 1 3','char'=>'R 1 3','num'=>'R 1 3','fb'=>'R 1 3'],'GOTO'=>[]],
                37=>['ACTION'=>['id'=>'R 2 4','int'=>'R 2 4','char'=>'R 2 4','num'=>'R 2 4','fb'=>'R 2 4'],'GOTO'=>[]],
                38=>['ACTION'=>['pv'=>'R 3 5'],'GOTO'=>[]],
                39=>['ACTION'=>['pv'=>'S 40', 'print'=>'S 41'],'GOTO'=>[]],
                40=>['ACTION'=>['id'=>'R 2 4','int'=>'R 2 4','char'=>'R 2 4','num'=>'R 2 4','fb'=>'R 2 4'],'GOTO'=>[]],
                41=>['ACTION'=>['operadordeatribuicao'=>'S 42']],
                42=>['ACTION'=>['id'=>'S 43', 'fb'=>'S 33']],
                43=>['ACTION'=>['fb'=>'R 5 4']]
            );
            */
            
            /*$this->afd = array(0=>['ACTION'=>['id'=>'S 2'],'GOTO'=>[EXP=>['$'=>1,'mais'=>5],EXP2=>['$'=>8,'menos'=>9,'mais'=>8],EXP3=>['$'=>3,'menos'=>3,'mais'=>3]]], 
                               1=>['ACTION'=>['$'=>'ACC '],'GOTO'=>[]],
                               2=>['ACTION'=>['$'=>'R 1 2','mais'=>'R 1 2','menos'=>'R 1 2'],'GOTO'=>[]], 
                               3=>['ACTION'=>['$'=>'R 1 1','mais'=>'R 1 1','menos'=>'R 1 1'],'GOTO'=>[]],
                               5=>['ACTION'=>['mais'=>'S 6'],'GOTO'=>[]],
                               6=>['ACTION'=>['id'=>'S 2'],'GOTO'=>[EXP2=>['$'=>7,'menos'=>9,'mais'=>8],EXP3=>['$'=>3,'menos'=>3,'mais'=>3]]],
                               7=>['ACTION'=>['$'=>'R 3 0','mais'=>'R 3 0'],'GOTO'=>[]],
                               8=>['ACTION'=>['$'=>'R 1 0','mais'=>'R 1 0'],'GOTO'=>[]],
                               9=>['ACTION'=>['menos'=>'S 10'],'GOTO'=>[]],
                               10=>['ACTION'=>['id'=>'S 2'],'GOTO'=>[EXP2=>['$'=>11,'menos'=>11,'mais'=>11],EXP3=>['$'=>11,'menos'=>11,'mais'=>11]]],
                               11=>['ACTION'=>['$'=>'R 3 1','mais'=>'R 3 1','menos'=>'R 3 1'],'GOTO'=>[]]
                            );
                            */ 
    

    /***
     * Entrada deve ser a lista de tokens gerada pelo analisador léxico
     */

    public function parser($entrada){
        $pilha = array();
        array_push($pilha,0);
        echo "\nPilha:".implode(' ',$pilha);
        $i = 0;
        while ($entrada){
            if (array_key_exists( $entrada[$i], $this->afd[end($pilha)]['ACTION']))
                $move = $this->afd[end($pilha)]['ACTION'][$entrada[$i]];
            else 
                return false;
            $acao = explode(' ',$move);
            echo " | Ação:".$move;
            switch($acao[0]){
                case 'S': // Shift - Empilha e avança o ponteiro
                    array_push($pilha,$acao[1]);
                    $i++;
                    break;
                case 'R': // Reduce - Desempilha e Desvia (para indicar a redução)  
                    for ($j = 0; $j<$acao[1]; $j++)
                        array_pop($pilha);
                    echo ' | Reduzio para '.NAO_TERMINAL[$acao[2]];                    
                    $desvio = $this->afd[end($pilha)]['GOTO'][$acao[2]][$entrada[$i]];
                    array_push($pilha,$desvio);
                    break;
                case 'ACC': // Accept
                    echo 'Ok';
                    return true;
                default:
                    echo 'Erro';
                    return false;
            }
            echo '<br>';
            echo "\nPilha:".implode(' ',$pilha);
        }
    }
}
?>