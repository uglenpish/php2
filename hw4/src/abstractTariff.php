<?php

abstract class AbstractTariff implements TariffInterface
{
  protected $pricePerKilometer;
  protected $pricePerMinute;
  protected $distance;
  protected $minutes;

  /** @var ServiceInterface[] */
  protected $services = [];

  public function __construct(int $distance, int $minutes)
  {
    $this->distance = $distance;
    $this->minutes = $minutes;
  }

  public function countPrice(): int
  {
    $price = $this->pricePerKilometer * $this->distance + $this->pricePerMinute * $this->minutes;

    if ($this->services) {
      foreach ($this->services as $service){
        $service->apply($this, $price);
      }
    }
    return $price;
  }

  public function addService(ServiceInterface $service): TariffInterface
  {
    array_push($this->services, $service);
    return $this;
  }

  public function getTime(): int
  {
    return $this->minutes;
  }

  public function getDistance(): int
  {
    return $this->distance;
  }
}
