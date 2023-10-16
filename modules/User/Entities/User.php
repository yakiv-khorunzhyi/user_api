<?php

namespace Modules\User\Entities;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Core\Entity\BaseEntity;

class User extends BaseEntity
{
    use HasApiTokens;
    use Notifiable;

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

    protected $hidden = [
        'email_verified_at',
        'password',
        'remember_token',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    //////////////////////////////////////////////////////////////////////////////

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $firstName): void
    {
        $this->first_name = $firstName;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getEmailVerifiedAt(): \Illuminate\Support\Carbon|null
    {
        return $this->email_verified_at;
    }

    public function setEmailVerifiedAt(\Illuminate\Support\Carbon|null $emailVerifiedAt): void
    {
        $this->email_verified_at = $emailVerifiedAt;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRememberToken(): ?string
    {
        return $this->remember_token;
    }

    public function setRememberToken(?string $rememberToken): void
    {
        $this->remember_token = $rememberToken;
    }
}
