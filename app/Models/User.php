<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
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
        'name',
        'email',
        'password',
        'role_id'
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
    public function user_picture()
    {
        return $this->hasOne(UserPicture::class);
    }
    public function records()
    {
        return $this->hasMany(Record::class);
    }
    public function examinees()
    {
        return $this->hasMany(Examinee::class);
    }
    public function exam_requests()
    {
        return $this->hasMany(ExamRequest::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    //role creation method
    const ADMIN = 1;
    const CONTROLLER = 2;
    const EXAMINEE = 3;

    public static function isAdmin()
    {
        if (auth()->user()->role_id == self::ADMIN) {
            return true;
        }
    }

    public static function isController()
    {
        if (auth()->user()->role_id == self::CONTROLLER) {
            return true;
        }
    }

    public static function isExaminee()
    {
        if (auth()->user()->role_id == self::EXAMINEE) {
            return true;
        }
    }
}
