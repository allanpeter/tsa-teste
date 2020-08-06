<?php

include 'Sum.php';

use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
  public function testeSum(){

    $sum = new Sum();

    $sum->setNum1(10);
    $sum->setNum2(5);

    $this->assertEquals(15,$sum->sum());
  }




}
