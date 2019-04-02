<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WishListModel extends Model
{
    protected $table="tbl_wishlist";
    protected $primaryKey="wishlist_id";
    public $timestamps=false;
}
