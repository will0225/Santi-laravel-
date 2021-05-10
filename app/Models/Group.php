<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Group extends Model
{
    use HasFactory;

    protected $table = 'group';

    protected $fillable = [
        'name', 'price'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

}
