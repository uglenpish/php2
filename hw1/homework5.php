<?php

//задание5
$bmw = array("model"=>"x5", "speed"=>"170", "doors"=>"5", "year"=>"2017");
$opel = array("model"=>"astra", "speed"=>"150", "doors"=>"5", "year"=>"2016");
$vaz = array("model"=>"vesta", "speed"=>"140", "doors"=>"5", "year"=>"2019");

$cars = array("bmw"=>$bmw, "opel"=>$opel, "vaz"=>$vaz);

foreach ($cars as $name => $car) {
echo "Car $name<br>";
echo "{$car['model']} {$car['speed']} {$car['doors']} {$car['year']}<br><br>";
}