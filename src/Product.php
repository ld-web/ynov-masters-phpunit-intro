<?php

namespace App;

use InvalidArgumentException;

class Product
{
  private $name;
  private $priceHT;
  const TVA = 0.2;

  public function __construct(string $name, float $priceHT)
  {
    if (empty($name)) {
      throw new InvalidArgumentException('name is required');
    }
    $this->name = $name;
    $this->priceHT = $priceHT;
  }

  public function getPriceTTC(): float
  {
    return $this->priceHT * (1 + self::TVA);
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of priceHT
   */
  public function getPriceHT()
  {
    return $this->priceHT;
  }

  /**
   * Set the value of priceHT
   *
   * @return  self
   */
  public function setPriceHT($priceHT)
  {
    $this->priceHT = $priceHT;

    return $this;
  }
}
