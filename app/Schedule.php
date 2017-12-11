<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Schedule
 *
 * @author Daniel Pérez Atanacio<daniel@goplek.com>
 * @package App
 */
class Schedule extends Model
{

    /**
     * STATUS: PENDING
     */
    const PENDING = 'PENDING';

    /**
     * STATUS: SENDED
     */
    const SENDED = 'SENDED';


    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'schedules';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['message_id', 'scheduled_at', 'status'];

    /**
     * Reset the timestamps value
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retrieve the message record that belongs to schedule
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function message() {
        return $this->belongsTo(Message::class);
    }

}
