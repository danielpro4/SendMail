<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App
 */
class Message extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'body'];
}
