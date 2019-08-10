<?php

namespace App\Http\Controllers\Retention;

use App\Http\Controllers\Controller;
use Exception;

/**
 * Class RetentionController
 * @package App\Http\Controllers\Retention
 */
class RetentionController extends Controller
{
    /**
     * @var RetentionService
     */
    protected $retentionService;

    /**
     * RetentionController constructor.
     * @param RetentionService $retentionService
     */
    public function __construct(RetentionService $retentionService)
    {
        $this->retentionService = $retentionService;
    }


    /**
     * @return false|string
     * @throws Exception
     */
    public function getRetentionData()
    {
        return $this->retentionService->getData();
    }
}
