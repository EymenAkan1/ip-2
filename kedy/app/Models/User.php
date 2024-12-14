<?php

namespace App\Models;

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
        'role',
        'parent_id',
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

    /**
     * Boot method to set parent_id based on role.
     */
    protected static function booted()
    {
        static::creating(function ($user) {
            // Admin için parent_id null olacak
            if ($user->role === 'admin') {
                $user->parent_id = null;
            }

            // Staff için parent_id Admin'in id'si olacak
            if ($user->role === 'staff') {
                // İlk admin kullanıcısını buluyoruz
                $adminUser = User::where('role', 'admin')->first();
                $user->parent_id = $adminUser ? $adminUser->id : null;
            }

            // Vendor için parent_id null olacak
            if ($user->role === 'vendor') {
                $user->parent_id = null;
            }

            // Vendor Worker için parent_id Vendor'un id'si olacak
            if ($user->role === 'vendor_worker') {
                // Vendor kullanıcısını buluyoruz
                $vendorUser = User::where('role', 'vendor')->first();
                $user->parent_id = $vendorUser ? $vendorUser->id : null;
            }

            // Customer için parent_id null olacak
            if ($user->role === 'customer') {
                $user->parent_id = null;
            }
        });

        // Kullanıcı güncellenirken de aynı mantığı uygulayalım
        static::updating(function ($user) {
            // Güncelleme sırasında da parent_id'yi doğru şekilde atayalım
            if ($user->role === 'admin') {
                $user->parent_id = null;
            } elseif ($user->role === 'staff') {
                $adminUser = User::where('role', 'admin')->first();
                $user->parent_id = $adminUser ? $adminUser->id : null;
            } elseif ($user->role === 'vendor') {
                $user->parent_id = null;
            } elseif ($user->role === 'vendor_worker') {
                $vendorUser = User::where('role', 'vendor')->first();
                $user->parent_id = $vendorUser ? $vendorUser->id : null;
            } else {
                $user->parent_id = null;
            }
        });
    }

    /**
     * Kullanıcıya ait ilişkilere (User -> Vendor gibi) modelleri eklemek
     */
    public function role()
    {
        return $this->belongsTo(Role::class); // User bir role'a sahip olacak
    }

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    // Staff ile ilişkilendirmek için Admin'e bir ilişki
    public function staff()
    {
        return $this->hasMany(User::class, 'parent_id')->where('role', 'staff');
    }

    // Vendor ile ilişkilendirmek için Vendor Worker'a bir ilişki
    public function vendorWorkers()
    {
        return $this->hasMany(User::class, 'parent_id')->where('role', 'vendor_worker');
    }

    // Vendor'a ait olan araçlar (Optional)
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'user_id');
    }
}
