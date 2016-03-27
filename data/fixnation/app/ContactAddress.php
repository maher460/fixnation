<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactAddress extends Model
{

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','street', 'street_number', 'city', 'state','country','zip','latitude','longitude', 'is_default'];


}
