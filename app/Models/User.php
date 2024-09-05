<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        // 'last_name',
        'email',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function person()
    {
        return $this->hasOne(Person::class);
    }

    // Relación muchos a muchos con Specialty a través de specialty_user
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, 'user_specialty', 'user_id', 'specialty_id');
    }
    // Relación muchos a muchos con Role a través de role_person
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function schedules()
{
    return $this->belongsToMany(Schedule::class, 'schedule_assignments', 'user_id', 'schedule_id')
                ->withPivot('active'); // Si quieres acceder al campo 'active'
}
}
