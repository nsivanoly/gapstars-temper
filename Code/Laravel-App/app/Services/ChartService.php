<?php


namespace App\Services;


use Exception;

/**
 * Class ChartService
 * @package App\Services
 */
class ChartService
{

    /**
     * @param $data
     * @return array
     * @throws Exception
     */
    public function calculateRetentionData($data)
    {
        $DateFormatService = new DateFormatService;
        $series = array();

        foreach ($data as $index => $week_data) {

            $Total = $week_data->Step1;
            for ($i = 1; $i <= 8; $i++) {
                $series[$index]['data'][] = round(($week_data->{"Step" . $i} / $Total) * 100);
            }

            $series[$index]['name'] = $DateFormatService->formatDate($week_data);

        }

        return $series;
    }
}
