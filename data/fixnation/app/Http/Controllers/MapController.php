<?php namespace App\Http\Controllers;

use App\ContactAddress;
use App\ContactMean;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DB;
use View;
use Illuminate\Support\Facades\Auth;


class MapController extends Controller {


    public function filterMap(Request $request){

        $string = $request->input('search');

		$returnData['search'] = $string;
        $stringArray = array_map('trim', explode(' ', $string));
		
		$user = Auth::user();

		$ip = $_SERVER['REMOTE_ADDR'];
		
		
		
		
        $q = '
		
            SELECT u.id, u.firstname, u.lastname, u.description, u.image,u.weekday_from, u.weekday_to, u.weekend_from, u.weekend_to, ua.latitude, ua.longitude,ua.street_number, ua.street, ua.city, ua.state, ua.country, jobCount.numOfJobs AS count, ROUND(ratings.rating) AS rating
			FROM users AS u
			LEFT JOIN users_addresses AS ua ON ( u.id = ua.user_id ) 
			LEFT JOIN (

			SELECT COUNT( Id ) AS numOfJobs, provider
			FROM jobs
			WHERE done =  "1"
			GROUP BY provider
			) AS jobCount ON ( u.id = jobCount.provider ) 
			
			LEFT JOIN (
			SELECT AVG( rating ) AS rating, provider
			FROM ratings
			GROUP BY provider
			) AS ratings ON (ratings.provider = u.id)
			
			
			
			WHERE u.provider =  "1"';
			//'.($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			if($user){
				$q.= ($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			}
		

		
        if(sizeof($stringArray) > 0){
            $q.= ' AND u.description LIKE "%'.implode('%" OR u.description LIKE "%', $stringArray).'%"';
        }
		
		

        $results = DB::select($q, array());
		
	
		
		$returnData['users'] = $results;

        return View::make('map')->with('usersData', $returnData);

    }
	
	
	public function filterMaherMap(Request $request){

        $string = $request->input('search');

		$returnData['search'] = $string;
        $stringArray = array_map('trim', explode(' ', $string));
		
		$user = Auth::user();

		$ip = $_SERVER['REMOTE_ADDR'];
		
		
		
		
        $q = '
		
            SELECT u.id, u.firstname, u.lastname, u.description, u.weekday_from, u.weekday_to, u.weekend_from, u.weekend_to, ua.latitude, ua.longitude,ua.street_number, ua.street, ua.city, ua.state, ua.country, jobCount.numOfJobs AS count, ROUND(ratings.rating) AS rating
			FROM users AS u
			LEFT JOIN users_addresses AS ua ON ( u.id = ua.user_id ) 
			LEFT JOIN (

			SELECT COUNT( Id ) AS numOfJobs, provider
			FROM jobs
			WHERE done =  "1"
			GROUP BY provider
			) AS jobCount ON ( u.id = jobCount.provider ) 
			
			LEFT JOIN (
			SELECT AVG( rating ) AS rating, provider
			FROM ratings
			GROUP BY provider
			) AS ratings ON (ratings.provider = u.id)
			
			
			
			WHERE u.provider =  "1"';
			//'.($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			if($user){
				$q.= ($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			}
		

		
        if(sizeof($stringArray) > 0){
            $q.= ' AND u.description LIKE "%'.implode('%" OR u.description LIKE "%', $stringArray).'%"';
        }
		
		

        $results = DB::select($q, array());
		
	
		
		$returnData['users'] = $results;

        return View::make('maherdev')->with('usersData', $returnData);

    }
	
	public function filterTomasMap(Request $request){

        $string = $request->input('search');

		$returnData['search'] = $string;
        $stringArray = array_map('trim', explode(' ', $string));
		
		$user = Auth::user();

		$ip = $_SERVER['REMOTE_ADDR'];
		
		
		
		
        $q = '
		
            SELECT u.id, u.firstname, u.lastname, u.description, u.image, ua.latitude,u.weekday_from, u.weekday_to, u.weekend_from, u.weekend_to, ua.longitude,ua.street_number, ua.street, ua.city, ua.state, ua.country, jobCount.numOfJobs AS count, ROUND(ratings.rating) AS rating
			FROM users AS u
			LEFT JOIN users_addresses AS ua ON ( u.id = ua.user_id ) 
			LEFT JOIN (

			SELECT COUNT( Id ) AS numOfJobs, provider
			FROM jobs
			WHERE done =  "1"
			GROUP BY provider
			) AS jobCount ON ( u.id = jobCount.provider ) 
			
			LEFT JOIN (
			SELECT AVG( rating ) AS rating, provider
			FROM ratings
			GROUP BY provider
			) AS ratings ON (ratings.provider = u.id)
			
			
			
			WHERE u.provider =  "1"';
			//'.($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			if($user){
				$q.= ($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			}
		

		
        if(sizeof($stringArray) > 0){
            $q.= ' AND u.description LIKE "%'.implode('%" OR u.description LIKE "%', $stringArray).'%"';
        }
		
		

        $results = DB::select($q, array());
		
	
		
		$returnData['users'] = $results;

        return View::make('tomasdev')->with('usersData', $returnData);

    }
	
	public function filterKarlMap(Request $request){

        $string = $request->input('search');

		$returnData['search'] = $string;
        $stringArray = array_map('trim', explode(' ', $string));
		
		$user = Auth::user();

		$ip = $_SERVER['REMOTE_ADDR'];
		
		
		
		
        $q = '
		
            SELECT u.id, u.firstname, u.lastname, u.description, u.image,u.weekday_from, u.weekday_to, u.weekend_from, u.weekend_to, ua.latitude, ua.longitude,ua.street_number, ua.street, ua.city, ua.state, ua.country, jobCount.numOfJobs AS count, ROUND(ratings.rating) AS rating
			FROM users AS u
			LEFT JOIN users_addresses AS ua ON ( u.id = ua.user_id ) 
			LEFT JOIN (

			SELECT COUNT( Id ) AS numOfJobs, provider
			FROM jobs
			WHERE done =  "1"
			GROUP BY provider
			) AS jobCount ON ( u.id = jobCount.provider ) 
			
			LEFT JOIN (
			SELECT AVG( rating ) AS rating, provider
			FROM ratings
			GROUP BY provider
			) AS ratings ON (ratings.provider = u.id)
			
			
			
			WHERE u.provider =  "1"';
			//'.($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			if($user){
				$q.= ($user->provider == 1 ? ' AND u.id != "'.$user->id.'" ' : '"" ');
			}
		

		
        if(sizeof($stringArray) > 0){
            $q.= ' AND u.description LIKE "%'.implode('%" OR u.description LIKE "%', $stringArray).'%"';
        }
		
		

        $results = DB::select($q, array());
		
	
		
		$returnData['users'] = $results;

        return View::make('karldev')->with('usersData', $returnData);

    }





    



}