<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserTermsStatusModel extends Model
{
    protected $table="tbl_user_terms_status";
    protected $primaryKey="status_id";
    public $timestamps=false;
}
