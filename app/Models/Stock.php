<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Stock extends Model
{
  use HasFactory;
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

  public function medicine(): BelongsTo
  {
    return $this->belongsTo(Medicine::class);
  }

  public function supplier(): BelongsTo
  {
    return $this->belongsTo(Supplier::class);
  }
}
