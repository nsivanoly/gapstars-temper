<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Retention
 * @package App\Models
 */
class Retention extends Model
{

    /**
     * @var string
     */
    protected $table = 'retention';


    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var array
     */
    protected $guarded = [];
}
