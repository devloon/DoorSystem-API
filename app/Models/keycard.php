<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keycard extends Model
{
    use HasFactory;

    protected $table = "keycards";
    protected $hidden = ['id'];
    
    protected $fillable = [
        'uid'
    ];

}
