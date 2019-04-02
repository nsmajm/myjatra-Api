<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TourModel extends Model
{
    protected $table="tbl_tours";
    protected $primaryKey="tour_id";
    public $timestamps=false;
}
