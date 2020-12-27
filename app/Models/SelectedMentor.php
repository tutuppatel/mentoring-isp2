<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectedMentor extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'selected_mentor';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
