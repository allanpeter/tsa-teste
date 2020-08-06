<?php

echo "Funções recursivas <br>
 2 - Crie uma função para imprimir em tela o menor número inteiro divisível 
 por 4, 5 e 6 ao mesmo tempo, utilizando as seguintes técnicas: <br>
 - Recurção <br>
 - Com laços de repetição. <br> 
 Qual técnica gastária mais desempenho da máquina? Recursão <br>
 Função recursiva para calcular o MDC (máximo divisor comum)";

function math_gcd($a,$b) 
{
    $a = abs($a); 
    $b = abs($b);
    if($a < $b) 
    {
        list($b,$a) = array($a,$b); 
    }
    if($b == 0) 
    {
        return $a;      
    }
    $r = $a % $b;
    while($r > 0) 
    {
        $a = $b;
        $b = $r;
        $r = $a % $b;
    }
    return $b;
}

function math_lcm($a, $b)
{
    return ($a * $b / math_gcd($a, $b));
}

function math_lcmm($args)
{

    if(count($args) == 2)
    {
        return math_lcm($args[0], $args[1]);
    }
    else 
    {
        $arg0 = $args[0];
        array_shift($args);
        return math_lcm($arg0, math_lcmm($args));
    }
}

echo "<pre>";
print_r(math_lcmm(array(4,5,6)));echo "<hr>";

echo "https://www.4devs.com.br/calculadora_mmc";



?>