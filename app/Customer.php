<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'service_id', 'type'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'service_id' => 'int',
    ];

    /**
     * Get the user that owns the task.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
