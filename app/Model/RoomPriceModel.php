<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomPriceModel extends Model
{
    protected $table="roomprice";
    protected $primaryKey="id";
    public $timestamps=false;
}
