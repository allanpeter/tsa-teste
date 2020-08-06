<?php

// Questões de PHP - MySql
// Funções e arrays

// 1 - Dado o array de funcionarios abaixo, escreva:

$funcionarios = [
    [
        'nome' => 'Alessandra',
        'idade' => 18,
        'organizacao' => '1',
        'salario' => '5000'
    ],
    [
        'nome' => 'Leandro',
        'idade' => 25,
        'organizacao' => '3',
        'salario' => '1900',
    ],
    [
        'nome' => 'Bruno',
        'idade' => 23,
        'organizacao' => '1',
        'salario' => '1800',
    ],
    [
        'nome' => 'Gustavo',
        'idade' => 20,
        'organizacao' => '2',
        'salario' => '2000',
    ]
];

echo "a) Uma função que retorne o nome do funcionário mais jovem";

function younger_employee($array)
{
    $employee = array_sort($array, 'idade', SORT_ASC);

    $employee_name = reset($employee);

    return reset($employee_name);
}
echo "<pre>";
print_r(younger_employee($funcionarios)); echo "<hr>";


echo "b) Uma função que gere um novo array agrupando os funcionarios por organizacao (organização como index) ";

function sort_organization($array)
{
    $new_employees = array();

    foreach ($array as $item) {
        $new_employees[$item['organizacao']][] = $item;
    }

    return $new_employees;
}
echo "<pre>";
print_r(sort_organization($funcionarios)); echo "<hr>";


echo "c) Uma função que retorne a média de salários;";

function payment_average($array)
{
    $employee = array_column($array, 'salario');

    $salary_sum = array_sum($employee);

    $employee_size = sizeof($array);

    return $salary_sum / $employee_size;
}

echo "<pre>";
print_r(payment_average($funcionarios)); echo "<hr>";


echo"d) Uma função que ordene os funcionarios pelo nome;";

function sort_name($array)
{
    $employee = array_sort($array, 'nome', SORT_ASC);

    return $employee;
}
echo "<pre>";
print_r(sort_name($funcionarios)); 







//Função de auxilio

function array_sort($array, $on, $order = SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
