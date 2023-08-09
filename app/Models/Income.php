<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'description', 'date', 'user_id', 'category'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
