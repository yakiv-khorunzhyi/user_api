<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string              $first_name
 * @property string              $last_name
 * @property string              email
 * @property string|null         phone
 * @property bool|null           email_verified_at
 * @property string              password
 * @property string|null         remember_token
 * @property \Carbon\Carbon      created_at
 * @property \Carbon\Carbon      updated_at
 * @property \Carbon\Carbon|null deleted_at
 * @method User create()
 */
class User extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
