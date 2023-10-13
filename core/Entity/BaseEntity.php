<?php

namespace Core\Entity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Core\Entity\BaseEntity create(array $params) create entity
 * @method void forceDelete()
 * @method static \Illuminate\Database\Query\Builder where($column, $operator = null, $value = null, $boolean = 'and')
 */
abstract class BaseEntity extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    public function getCreatedAt(): \Illuminate\Support\Carbon
    {
        return $this->created_at;
    }

    /**
     * Used annotation because of Laravel base method declaration
     *
     * @param \Illuminate\Support\Carbon $createdAt
     *
     * @return void
     */
    public function setCreatedAt($createdAt): void
    {
        $this->created_at = $createdAt;
    }

    public function getUpdatedAt(): \Illuminate\Support\Carbon
    {
        return $this->updated_at;
    }

    /**
     * Used annotation because of Laravel base method declaration
     *
     * @param \Illuminate\Support\Carbon $updatedAt
     *
     * @return void
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updated_at = $updatedAt;
    }

    public function getDeletedAt(): ?\Illuminate\Support\Carbon
    {
        return $this->deleted_at;
    }

    /**
     * Used annotation because of Laravel base method declaration
     *
     * @param \Illuminate\Support\Carbon|null $deletedAt
     *
     * @return void
     */
    public function setDeletedAt($deletedAt): void
    {
        $this->deleted_at = $deletedAt;
    }
}
