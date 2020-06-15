<?php

include "../src/abstractTariff.php";
include "../src/serviceDriver.php";
include "../src/serviceGPS.php";
include "../src/serviceInterface.php";
include "../src/tariffBasic.php";
include "../src/tariffInterface.php";
include "../src/tariffStudent.php";
include "../src/tariffHour.php";

$tariff = new TariffBasic(15, 60);
echo $tariff -> countPrice();