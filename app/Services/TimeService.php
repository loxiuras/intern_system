<?php

namespace App\Services;

class TimeService
{

    /** @var int */
    private $time = 0;

    /**
     * @param int $time
     */
    public function __construct( int $time )
    {
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function transform(): string
    {
        $hours = 0;
        $minutes = 0;

        $time = $this->time;
        while( $time >= 60 ) {

            $time = ($time - 60);
            $hours++;
        }
        $minutes = $time;

        $timeText = "";

        if ( !empty( $hours ) && $hours > 0 ) {
            $hourTranslation = $hours > 1 ? 'hours' : 'hour';
            $timeText .= $hours . " " . $hourTranslation;
        }

        if ( (!empty( $minutes ) && $minutes > 0) && (!empty( $hours ) && $hours > 0) ) {
            $timeText .= " and ";
        }

        if ( !empty( $minutes ) && $minutes > 0 ) {
            $minuteTranslation = $minutes > 1 ? 'minutes' : 'minute';
            $timeText .= $minutes . " " . $minuteTranslation;
        }

        return $timeText;
    }
}
