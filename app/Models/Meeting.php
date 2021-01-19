<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
//    use meetings;

    protected $guarded = [];
    protected $table = 'meetings';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
