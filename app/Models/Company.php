<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $fillable = ['company_name'];

    protected $table = 'companies';

    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
