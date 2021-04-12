<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function stacks(){
        return $this->belongsToMany(Stack::class, "register_stack", "register_id", "stack_id")->withTimestamps();
    }
}
