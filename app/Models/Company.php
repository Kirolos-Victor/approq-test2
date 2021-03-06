<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['country_id'];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
