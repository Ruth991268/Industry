<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['criterion_id', 'question'];

    public function criterion()
    {
        return $this->belongsTo(Criterion::class);
    }
}
