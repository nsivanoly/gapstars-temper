<?php
namespace App\Retention;

/**
 * Interface RepositoryInterface
 * @package App\Retention
 */
interface RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $request
     * @return mixed
     */
    public function create($request);

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function getRetentionData();
}
