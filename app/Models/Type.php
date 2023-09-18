<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  protected $guarded = ['_token'];

  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

  protected static function boot()
  {
    parent::boot();
    self::creating(function ($model) {
      $model->uuid = (string) Uuid::uuid4();
    });
  }

  public function medicines(): HasMany
  {
    return $this->hasMany(Medicine::class);
  }
}
