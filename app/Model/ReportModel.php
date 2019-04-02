<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    protected $table="tbl_report";
    protected $primaryKey="report_id";
    public $timestamps=false;
}
