<?php
// Orientação a objeto e Padrão de projeto
echo " 3 - Crie uma classe contendo 3 propriedades com seus respectivos gets e sets e um método que 
       concatene e retornando os 3 em uma string."."<br>";


class Car 
{

  private $data = array();

  public function __set($name, $value)
  {
      $this->data[$name] = $value;
  }

  public function __get($name)
  {
      if (array_key_exists($name, $this->data)) {
          return $this->data[$name];
      }
      $trace = debug_backtrace();
      trigger_error(
          'Undefined property via __get(): ' . $name .
          ' in ' . $trace[0]['file'] .
          ' on line ' . $trace[0]['line'],
          E_USER_NOTICE);
      return null;
  }

  public function string_concat()
  {    
    foreach($this->data as $key => $value){
      echo $key.' - '.$value." | ";
    }
  }
}

$obj = new Car;

$obj->manufacturer = 'Subaru';
$obj->hp = 350;
$obj->model = 'Impreza';

//$obj->string_concat();


