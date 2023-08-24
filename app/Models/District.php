<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'code',
        'city_code',
        'name',
        'meta',
    ];

    public function cities()
    {
        return $this->hasMany(City::class, 'city_code', 'code');
    }
}
