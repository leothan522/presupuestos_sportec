<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'estatus',
        'permisos',
        'profile_photo_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
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
     * The attributes that should be cast.
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

    //AdminLTE
    public function adminlte_image()
    {
        //return 'https://picsum.photos/300/300';
        //return "https://ui-avatars.com/api/?name=".Auth::user()->name."&color=7F9CF5&background=EBF4FF";
        return verImagen(auth()->user()->profile_photo_path, auth()->user()->name);
    }

    public function adminlte_desc()
    {
        return Auth::user()->email;
    }

    public function adminlte_profile_url()
    {
        return 'user/profile';
    }

    public function scopeBuscar($query, $keyword)
    {
        return $query->where('name', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%");
    }


    public function presupuesto()
    {
        return $this->hasMany(Presupuesto::class, 'users_id', 'id');
    }


}
