<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermsModel extends Model
{
    protected $table="tbl_terms_conditions";
    protected $primaryKey="terms_id";
    public $timestamps=false;
}
