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

    private function getTimeData()
    {
        $hours = 0;
        $minutes = 0;

        $time = $this->time;
        while( $time >= 60 ) {

            $time = ($time - 60);
            $hours++;
        }
        $minutes = $time;

        $timeData = new \stdClass();
        $timeData->hours   = $hours;
        $timeData->minutes = $minutes;

        return $timeData;
    }

    /**
     * @return string
     */
    public function transform(): string
    {
        $timeData = $this->getTimeData();
        $hours = $timeData->hours;
        $minutes = $timeData->minutes;

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

    /**
     * @return int
     */
    public function transformHours(): int
    {
        $timeData = $this->getTimeData();
        return (int)$timeData->hours;
    }

    /**
     * @return int
     */
    public function transformMinutes(): int
    {
        $timeData = $this->getTimeData();
        return (int)$timeData->minutes;
    }
}
