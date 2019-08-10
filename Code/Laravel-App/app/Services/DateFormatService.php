<?php


namespace App\Services;


use Carbon\Carbon;
use Exception;

/**
 * Class DateFormatService
 * @package App\Services
 */
class DateFormatService
{
    /**
     * @param $week_data
     * @return string
     * @throws Exception
     */
    public function formatDate($week_data)
    {
        $date = new Carbon();
        $date->setISODate($week_data['year'], $week_data['week_no']);
        return $date->startOfWeek()->format('Y/m/d') . '-' . $date->endOfWeek()->format('d');
    }
}
