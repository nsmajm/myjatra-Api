<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChatModel extends Model
{
    protected $table="tbl_chat";
    protected $primaryKey="chat_id";
    public $timestamps=false;
}
