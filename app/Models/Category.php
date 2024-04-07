<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function isManager()
    {
        return $this->manager()->exists();
    }

    public function assingtaske()
    {
        return $this->hasMany(Assingtask::class);
    }

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
