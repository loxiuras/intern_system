<?php

namespace App\Services;

class DateService
{

    /** @var string */
    private string $date = '';

    /**
     * @param string $date
     */
    public function __construct( string $date )
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function friendly(): string
    {
        return !empty( $this->date ) ? date("d-m-Y", strtotime($this->date)) : "";
    }

    public function translate()
    {
        if ( empty( $this->date ) ) return "";

        $parts = explode( "-", $this->date );

        return (int)$parts[2] . " " . __("general.months.". (int)$parts[1] ) . " " . $parts[0];
    }
}
