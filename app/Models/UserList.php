<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;
    protected $table = 'user_list';

    protected $fillable = [
        'name','email','number','date'
    ];

    public function getUser()
    {
        return $this->belongsTo(UserDetail::class,'id','user_id');
    }
}
