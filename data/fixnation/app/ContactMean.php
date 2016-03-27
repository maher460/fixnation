<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactMean extends Model
{

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_contact_means';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'mean_id', 'value', 'is_default'];


}
