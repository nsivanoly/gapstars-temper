<?php


namespace App\Services;


/**
 * Class DataFormatService
 * @package App\Services
 */
class DataFormatService
{
    /**
     * @param $data
     * @return false|string
     */
    public function formatJson($data)
    {
        return json_encode($data);
    }
}
