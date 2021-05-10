<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\Invoice;
use App\Models\Card;
use App\Models\Logs;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use App\Models\Group;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;
    use Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'first_name', 'last_name', 'nick_name', 'phone', 'address', 'bio', 'active', 'company', 'balance', 'city', 'country', 'zip', 'state', 'vat_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function balances() {
        return $this->hasMany(Balance::class);
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }

    public function invoices() {
        return $this->hasMany(Invoice::class);
    }

    public function cards() {
        return $this->hasMany(Card::class);
    }

    public function logs() {
        return $this->hasMany(Logs::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
