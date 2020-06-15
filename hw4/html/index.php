<?php
include "../src/tariffInterface.php";
include "../src/serviceInterface.php";
include "../src/serviceGPS.php";
include "../src/serviceDriver.php";

include "../src/abstractTariff.php";


include "../src/tariffBasic.php";
include "../src/tariffStudent.php";
include "../src/tariffHour.php";

$tariff = new TariffBasic(5, 60);
$tariff -> addService(new ServiceGPS(15));
$tariff -> addService(new ServiceDrive());
echo $tariff -> countPrice();
echo '<br>';
$tariff2 = new TariffHour(5, 59);
echo $tariff2 -> countPrice();
echo '<br>';
$tariff3 = new TariffStudent(5, 60);
echo $tariff3 -> countPrice();