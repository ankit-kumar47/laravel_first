<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
  use HasFactory;
  protected $fillable = ['title', 'description', 'company', 'email', 'website', 'location', 'tags', 'logo'];

  public function scopeFilter($query, $filters)
  {
    if ($filters['tag'] ?? false) {
      return $query->where('tags', 'like', '%' . $filters['tag'] . '%');
    } elseif ($filters['search'] ?? false) {
      return $query->where('title', 'like', '%' . $filters['search'] . '%')
        ->orWhere('description', 'like', '%' . $filters['search'] . '%')
        ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
        ->orWhere('company', 'like', '%' . $filters['search'] . '%');
    }
  }
}
