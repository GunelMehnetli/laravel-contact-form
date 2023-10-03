<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;
    protected $fillable = ['phone'];

    protected $table = 'phones';


    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
