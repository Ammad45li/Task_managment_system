<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssingTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'student_id',
        'category_id',
        'email',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
