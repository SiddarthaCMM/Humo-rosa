<?php

namespace App\Models;

use Orchid\Platform\Models\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'email',
        'permissions',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    public function cart()
    {
        return $this->hasOne(\App\Models\Cart::class);
    }

    
    protected static function booted()
    {
        static::created(function ($user) {
            // Crear carrito automáticamente
            \App\Models\Cart::create([
                'user_id' => $user->id,
            ]);
    
            // Asignar rol de cliente (ID = 1)
            DB::table('role_users')->insert([
                'user_id' => $user->id,
                'role_id' => 1,
            ]);
        });
    }
}