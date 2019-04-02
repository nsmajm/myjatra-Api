<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DestinationModel extends Model
{
    protected $table="tbl_destinations";
    protected $primaryKey="destination_id";
    public $timestamps=false;
}
