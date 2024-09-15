<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // type de clé primaire comme chaîne de caractères
    protected $keyType = 'string';

    // Désactiver l'incrémentation automatique
    public $incrementing = false;

    // longueur maximale de l'UUID
    protected $maxLength = 36;

    // Générer automatiquement UUID
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = \Illuminate\Support\Str::uuid()->toString();
            }
        });
    }

    protected $fillable = ['name', 'logo'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
