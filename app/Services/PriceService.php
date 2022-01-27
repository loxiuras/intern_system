<?php

namespace App\Services;

use function PHPUnit\Framework\stringContains;

class PriceService
{

    private $price = 0;

    /**
     * @param int $price
     */
    public function __construct( mixed $price)
    {
        $this->price = $price;
    }

    /**
     * @param bool $showValuta
     * @return string
     */
    public function transform( bool $showValuta = true ): string
    {
        return ( $showValuta ? "&euro; " : "" ) . number_format((float)( $this->price / 100 ), 2, ',', '.');
    }

    /**
     * @return string
     */
    public function transformDatabase(): string
    {
        $price = str_replace(".", "", $this->price);

        if ( str_contains( $price, "," ) ) {
            return str_replace(",", "", $price);
        } else {
            return (int)$price * 100;
        }
    }
}
