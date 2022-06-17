<?php

namespace App\Models;

use App\Traits\HasImage;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasImage;

    protected $fillable = [
        'tipo_usuario',
        'first_name',
        'last_name',
        'personal_phone',
        'password',
        'email',
        
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Relación de uno a muchos
    // Un usuario puede realizar muchos registros de contratos.
    public function contratos()
    {
        return $this->hasMany(contrato::class);
    }

    // Relación polimórfica uno a uno
    // Un usuario pueden tener una imagen
    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }


    public function getFullName(): string
    {
        return "$this->first_name $this->last_name";
    }

    
    public function generateAvatarUrl(): string
    {
        $ui_avatar_api = "https://ui-avatars.com/api/?name=*+*&size=128";

        return Str::replaceArray(
            '*',
            [
                $this->first_name,
                $this->last_name
            ],
            $ui_avatar_api
        );
    }

    public function updateUIAvatar(string $avatar_url)
    {
        $user_image = $this->image;

        $image_path = $user_image->path;

        if (Str::startsWith($image_path, 'https://'))
        {
            $user_image->path = $avatar_url;
            $user_image->save();
        }
    }  

}
