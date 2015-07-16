<?php

namespace TeachMe\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 */
class Entity extends Model
{

    public static function getClass()
    {
        return get_class(new static);
    }
}
