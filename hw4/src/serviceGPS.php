<?php
class ServiceGPS implements  ServiceInterface
{
  private $pricePerHour;

  public function __construct(int $pricePerHour)
  {
    $this->pricePerHour = $pricePerHour;
  }

  public function apply(TariffInterface $tariff, &$price)
  {
    $hours = ceil($tariff->getTime() / 60);
    $price += $this->pricePerHour * $hours;
  }
}