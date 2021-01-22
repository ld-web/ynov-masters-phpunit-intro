<?php

namespace App\Tests;

use App\Product;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
  public function testProductWithEmptyNameCannotBeCreated()
  {
    $this->expectException(InvalidArgumentException::class);
    $product = new Product('', 156);
  }

  /**
   * @dataProvider productProvider
   */
  public function testPriceTtcIsCorrectlyComputed(Product $product, float $expectedTtcPrice)
  {
    $this->assertEquals($expectedTtcPrice, $product->getPriceTTC());
  }

  public function productProvider()
  {
    yield 'Télévision à 500€' => [new Product('Télé', 500), 600];
    yield 'Téléphone à 800€' => [new Product('Téléphone', 800), 960];
  }
}
