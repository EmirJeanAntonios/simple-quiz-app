<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Survey extends Model
{
    use HasFactory;

    protected $primaryKey = "uuid";
    protected $keyType = "string";
    public $incrementing = false;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
