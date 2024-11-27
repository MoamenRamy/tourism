<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'username',
        'phone',
        'nationality_id',
        'currency_id',
        'language'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // relation with tours reservation
    public function tourReservations()
    {
        return $this->hasMany(Tour_reservation::class);
    }

    // relation with packages reservation
    public function packageReservations()
    {
        return $this->hasMany(PackageReservation::class);
    }

    // relation with transportation reservation
    public function transportationReservations()
    {
        return $this->hasMany(Transportation_reservation::class);
    }

    // relation with currency
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    // relation with nationality
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    // roles
    public function manager()
    {
        return $this->role == 'manager';
    }

    public function admin()
    {
        return $this->role == 'admin';
    }

    // relation with alerts
    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }

    // relation with notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // relation with rate
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

}
