<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelImageModel extends Model
{
    protected $table="hotel_images";
    protected $primaryKey="id";
    public $timestamps=false;
}
