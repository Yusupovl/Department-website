<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hodimlar extends Model
{
    use HasFactory;
    protected $table = 'hodimlars';

    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'email', 'email');
    }
}
