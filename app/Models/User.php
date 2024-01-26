<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'phone',
        'address',
        'role',
        'status',
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
    public static function getpermissionGroup()
    {
        $permission_group = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_group;
    }
    public static function GetPermissionByGroupName($group_name)
    {
        $Permissions = DB::table('permissions')->select('name', 'id')->where('group_name', $group_name)->get();
        return $Permissions;
    }
    public static function roleHasPermissions($role, $Permissions)
    {
        $hasPermission = true;
        foreach ($Permissions as $Permission) {
            // $hasPermission = $hasPermission && $role->hasPermissionTo($Permission->name);
            if (!$role->hasPermissionTo($Permission)) {
                $hasPermission = false;      break;

            }
        }
        return $hasPermission;
    }
}
