<?php

namespace Marquine\EloquentUuid;

trait Uuid
{
    /**
     * Boot uuid primary key.
     *
     * @return void
     */
    protected static function bootUuid()
    {
        static::creating(function ($model) {
            $model->incrementing = false;

            if (! is_uuid($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = uuid();
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
