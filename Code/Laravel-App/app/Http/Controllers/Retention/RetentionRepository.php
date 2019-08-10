<?php

namespace App\Http\Controllers\Retention;

use App\Models\Retention;
use App\Retention\RepositoryInterface;
use Illuminate\Support\Facades\DB;


/**
 * Class RetentionRepository
 * @package App\Http\Controllers\Retention
 */
class RetentionRepository implements RepositoryInterface
{


    /**
     * @var Retention
     */
    protected $retention;


    /**
     * RetentionRepository constructor.
     * @param Retention $retention
     */
    public function __construct(Retention $retention)
    {
        $this->retention = $retention;
    }

    /**
     * @return Retention[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAll()
    {
        return $this->retention::all();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        return $this->retention::create($request);
    }

    /**
     * @param $id
     * @return int|mixed
     */
    public function delete($id)
    {
        return $this->retention::destroy($id);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id)
    {
        return $this->retention::where('id', $id)->update($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->retention::find($id);
    }

    /**
     * @return mixed
     */
    public function getRetentionData()
    {
        $results = $this->retention
            ->select(
            // Year of the chart
                DB::raw("DATE_FORMAT(`created_at`,'%Y') AS year"),
                // Week number
                DB::raw("WEEK(`created_at`) AS `week_no`"),
                // Count all the users with in the week
                DB::raw("SUM(IF(onboarding_perentage <= 100, 1, 0)) AS Step1"),
                // Count all the users who created the account [ exclude the users never interacted] with in the week
                DB::raw("SUM(IF(onboarding_perentage > 0 AND onboarding_perentage <= 100, 1, 0)) AS Step2"),
                // Number of users completed Step 3
                DB::raw("SUM(IF(onboarding_perentage > 20 AND onboarding_perentage <= 100, 1, 0)) AS Step3"),
                // Number of users completed Step 4
                DB::raw("SUM(IF(onboarding_perentage > 40 AND onboarding_perentage <= 100, 1, 0)) AS Step4"),
                // Number of users answered freelancer Qs
                DB::raw("SUM(IF(onboarding_perentage > 50 AND onboarding_perentage <= 100, 1, 0)) AS Step5"),
                // Number of users Waiting for approval
                DB::raw("SUM(IF(onboarding_perentage > 70 AND onboarding_perentage <= 100, 1, 0)) AS Step6"),
                // Count the users who completed with in the week
                DB::raw("SUM(IF(onboarding_perentage > 90 AND onboarding_perentage <= 100, 1, 0)) AS Step7"),
                // Count the users who Approval with in the week
                DB::raw("SUM(IF(onboarding_perentage = 100, 1, 0)) AS Step8")
            )
            ->groupBy('week_no')
            ->groupBy('year')
            ->get();

        return $results;
    }
}
