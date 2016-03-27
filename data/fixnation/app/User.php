<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','firstname', 'lastname', 'email', 'password', 'provider', 'image','weekday_from','weekday_to', 'weekend_from','weekend_to'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
	
	public function getPendingJobsAmount(){
		
		 $q =' SELECT count(*) AS count FROM jobs WHERE confirmed="0" AND declined="0" AND done="0" AND (customer = "'.$this->id.'"'.($this->provider ? ' OR provider = "'.$this->id.'"' : '').')';
		 
		 $results = DB::select($q, array());
		 $count = $results[0]->count;
		 
		 return $count;
		
	}
}
