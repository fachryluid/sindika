<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Sale extends Model
{
  use HasFactory;

  protected $fillable = ['stock_id', 'quantity_sold', 'date', 'month', 'year'];
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
  public function stock(): BelongsTo
  {
    return $this->belongsTo(Stock::class);
  }
}
