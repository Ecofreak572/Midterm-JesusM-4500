<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producthistory extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'producthistories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'services',
        'software',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function item_names()
    {
        return $this->belongsToMany(Computer::class);
    }

    public function item_name_1s()
    {
        return $this->belongsToMany(Phone::class);
    }

    public function item_name_2s()
    {
        return $this->belongsToMany(Tablet::class);
    }

    public function item_name_3s()
    {
        return $this->belongsToMany(Laptop::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
