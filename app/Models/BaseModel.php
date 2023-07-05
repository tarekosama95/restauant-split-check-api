<?php

namespace App\Models;

use App\Exceptions\ModelNotFoundException;
use Dyrynda\Database\Casts\EfficientUuid;
use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class BaseModel extends Model
{
    use SoftDeletes, GeneratesUuid;

    /**
     * UUID version to use
     *
     * @var int
     */
    protected $uuidVersion = 'uuid4';

    public function uuidColumn(): string
    {
        return 'uuid';
    }

    /**
     * Attributes that should be casted
     *
     * @var array
     */
    protected $casts = [
        'uuid' => EfficientUuid::class,
    ];

    /**
     * Check record in model
     */
    public function resolveRouteBinding($value, $field = null)
    {
        $model = null;
        if (Uuid::isValid($value)) {
            $model = static::whereUuid($value)->first();
            if (! $model) {
                throw new ModelNotFoundException();
            }
        }

        return $model;
    }
}
