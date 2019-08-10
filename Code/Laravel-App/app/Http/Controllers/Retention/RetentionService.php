<?php


namespace App\Http\Controllers\Retention;


use App\Services\ChartService;
use App\Services\DataFormatService;
use Exception;

/**
 * Class RetentionService
 * @package App\Http\Controllers\Retention
 */
class RetentionService
{
    /**
     * @var RetentionRepository
     */
    protected $retentionRepository;
    /**
     * @var ChartService
     */
    protected $ChartService;
    /**
     * @var DataFormatService
     */
    protected $DataFormatService;

    /**
     * RetentionService constructor.
     * @param RetentionRepository $retentionRepository
     */
    public function __construct(RetentionRepository $retentionRepository)
    {
        $this->retentionRepository = $retentionRepository;
        $this->ChartService = new ChartService;
        $this->DataFormatService = new DataFormatService;
    }

    /**
     * @return false|string
     * @throws Exception
     */
    public function getData()
    {
        $data = $this->retentionRepository->getRetentionData();
        $series_data = $this->ChartService->calculateRetentionData($data);
        $series_json_data = $this->DataFormatService->formatJson($series_data);
        return $series_json_data;
    }
}
