<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//utilizar el metodo atribute para mutadores y accesores
use Illuminate\Database\Eloquent\Casts\Attribute;

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


    //agregar codigo de mutadores y accesores version 10 laravel
    /*poner el nombre de la funcion aque atributo queremos modificar */
    protected function name(): Attribute
    {
        return new Attribute(
            //ucwords: poner todo en miniscula
            //strtolower: las primeras letras seran mayuscula de cada palabra
            get: fn($valor)=> ucwords($valor),
            set: fn($valor)=> strtolower($valor)
            
        );
    }



}
