<?php

namespace App\Services;

class ImportService
{

    /** @var null|string */
    private $fileDirectory = null;

    /**
     * @param string $fileDirectory
     */
    public function __construct( string $fileDirectory )
    {
       $this->fileDirectory = $fileDirectory;
    }

    public function cast()
    {
        $returnData = [];

        $counter = 0;
        $headers = null;
        if (($handle = fopen( $this->fileDirectory, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ";")) !== false) {
                if ( empty( $counter ) ) {
                    $counter++;
                    $headers = $data;
                    continue;
                }

                $itemData = [];
                $itemCounter = 0;
                foreach ( $data as $item ) {
                    $itemData[ $this->transformHeader( $headers[$itemCounter] ) ] = $item;

                    $itemCounter++;
                }

                $returnData[] = $itemData;

                $counter++;
            }
        }

        return $returnData;
    }

    /**
     * @param string $header
     *
     * @return array|string|string[]
     */
    private function transformHeader( string $header )
    {
        return str_replace( " ", "_", strtolower( $header ) );
    }
}
