<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicine extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'image', 'unit_id', 'type_id', 'category_id'];

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

  public function unit(): BelongsTo
  {
    return $this->belongsTo(Unit::class);
  }

  public function type(): BelongsTo
  {
    return $this->belongsTo(Type::class);
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function stocks(): HasMany
  {
    return $this->hasMany(Stock::class);
  }

  // Fungsi untuk mengambil url gambar menggantikan $medicine->image
  public function getImageAttribute($image): string
  {
    return asset($image ? '/storage/uploads/medicine/' . $image : '/img/medicine-default.jpg');
  }
}
