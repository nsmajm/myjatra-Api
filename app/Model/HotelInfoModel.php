<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelInfoModel extends Model
{
    protected $table="hotel_info";
    protected $primaryKey="id";
    public $timestamps=false;
}
