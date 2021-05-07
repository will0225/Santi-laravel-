<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_name',	"user_register_enable",	'maintenance',	'invoice_info',	'invoice_number',	'invoice_format',	'invoice_reset',	'date_format'	
    ];
}