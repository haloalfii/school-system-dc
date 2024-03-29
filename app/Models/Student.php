<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $table = 'students';
    use HasFactory;

    protected $guarded = ['id'];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }
}
