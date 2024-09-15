<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
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

    protected $fillable = ['order_id', 'quantity'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
