<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'medicine_id';

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'medicine_id', 'medicine_id');
    }
    protected $fillable = [
        'name' ,
        'brand',
        'dosage',
        'form',
        'price',
        'stock'
    ];
}
