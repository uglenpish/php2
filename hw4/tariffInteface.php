<?php
interface TariffInterface
{
  public function countPrice(): int;
  public function addService(ServiceInterface $service, &$price);
  public function getTime(): int;
  public function detDistance(): int;
}