<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Question extends Model
{
    use HasFactory;

    protected $primaryKey = "uuid";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = ['question'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class, "survey_uuid");
    }
}
