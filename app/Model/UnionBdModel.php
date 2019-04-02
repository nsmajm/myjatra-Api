<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UnionBdModel extends Model
{
    protected $table="union_bd";
    protected $primaryKey="union_id";
    public $timestamps=false;
}
