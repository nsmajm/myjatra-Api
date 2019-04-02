<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TourMemberModel extends Model
{
    protected $table="tbbl_tour_members";
    protected $primaryKey="tour_member_id";
    public $timestamps=false;
}
