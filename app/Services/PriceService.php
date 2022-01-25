<?php

namespace App\Services;

class PriceService
{

    /** @var int */
    private $price = 0;

    /**
     * @param int $price
     */
    public function __construct( int $price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function transform(): string
    {
        return "&euro; " . number_format((float)( $this->price / 100 ), 2, ',', '.');
    }
}
