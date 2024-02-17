<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $table = 'feeds';
    protected $primarykey ='id';

    protected $fillable=[
        'created_by','video','caption'
    ];
}
