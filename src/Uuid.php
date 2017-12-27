<?php

namespace Marquine\EloquentUuid;

use Ramsey\Uuid\Uuid as Generator;

trait Uuid
{
    /**
     * Boot uuid trait.
     *
     * @return void
     */
    protected static function bootUuid()
    {
        static::creating(function ($model) {
            if (! Generator::isValid($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Generator::uuid4()->toString();
            }
        });
    }

    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
}
