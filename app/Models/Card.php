<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'card_number', 'exp_month', 'exp_year', 'name', 'cvc'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
