<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'href',
        'position',
        'visible',
        'group',
        'parent_id',
        'icon',
    ];

    protected $casts = [
        'visible' => 'boolean',
        'position' => 'integer',
        'parent_id' => 'integer',
    ];
}
