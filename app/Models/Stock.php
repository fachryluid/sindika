<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Stock extends Model
{
  use HasFactory;

  protected $fillable = ['supplier_id', 'medicine_id', 'quantity', 'order_cost', 'storage_cost', 'order_date', 'expected_delivery', 'price', 'expired_date'];

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

  public function sales(): HasMany
  {
    return $this->hasMany(Sale::class);
  }

  protected function orderCost(): Attribute
  {
    return Attribute::make(
      set: fn(string $value) => (int) str_replace(',', '', $value),
    );
  }

  protected function storageCost(): Attribute
  {
    return Attribute::make(
      set: fn(string $value) => (int) str_replace(',', '', $value),
    );
  }

  protected function price(): Attribute
  {
    return Attribute::make(
      set: fn(string $value) => (int) str_replace(',', '', $value),
    );
  }
}
