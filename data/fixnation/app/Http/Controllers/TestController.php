<?php namespace App\Http\Controllers;

use App\ContactAddress;
use App\ContactMean;
use App\User;
use App\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use DB;
use View;
use Input;
use File;
use Storage;

use Illuminate\Support\MessageBag;
use App\Rating;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller {


      public function createUser(Request $request){

	
		
	 
        $this->validate($request, [
            'firstname' => 'required|alpha_dash|min:2|max:32',
            'lastname' => 'required|alpha_dash|min:2|max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
			'image' => 'image|mimes:jpeg,bmp,png'
			
        ]);
		
		  
		
		

        // if no errors found than continue from here

        $user = new User();
        $user->firstname =  $request->input('firstname');
        $user->lastname =  $request->input('lastname');
        $user->email =  $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->provider =  $request->input('provider')?:0;
        $user->description =  $request->input('description');
		$user->weekday_from =  $request->input('weekday_from');
		$user->weekday_to =  $request->input('weekday_to');
		$user->weekend_from =  $request->input('weekend_from');
		$user->weekend_to =  $request->input('weekend_to');
		
		echo __FILE__.' on line '.__LINE__?><pre><?print_r($user)?></pre><?
		  
		
        $user->save();
		
		echo __FILE__.' on line '.__LINE__?><pre><?print_r($user)?></pre><?
		  
		  die();
		
		
		

        if(Input::file('image')){
			File::Delete('profile_images/user_74.JPG'); // delete current file
			$destinationPath = 'profile_images'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = 'user_'.$user->id.'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			$user->image = $fileName;
			$user->save();
        }
				
		
		if($request->input('mobile')){
           $contactMean = new ContactMean();
           $contactMean->user_id = $user->id;
           $contactMean->mean_id = 1;
           $contactMean->value = $request->input('mobile');
           $contactMean->save();
        }

        if($request->input('address_name')){
           $contactAddress = new ContactAddress();
           $contactAddress->user_id = $user->id;
           $contactAddress->street =  $request->input('route');
		   $contactAddress->street_number =  $request->input('street_number');
           $contactAddress->city = $request->input('locality');
           $contactAddress->state = $request->input('administrative_area_level_1');
           $contactAddress->country = $request->input('country');
           $contactAddress->zip = $request->input('postal_code');
           $contactAddress->latitude = $request->input('latitude');
           $contactAddress->longitude = $request->input('longitude');
           $contactAddress->save();
        }

		 Auth::loginUsingId($user->id);
		
        return redirect($user->provider == 1 ? 'jobs':'map');

    }

    public function showJobs(){

        $user = Auth::user();
        


        if($user){

            $q = '
            SELECT u.firstname, u.lastname, g.*, g.id AS jobId, ua.*, ucm.value AS mobile
            FROM jobs AS g
            LEFT JOIN users AS u ON (u.id = '.($user->provider == 1 ? ' g.customer ' : 'g.provider').')
			LEFT JOIN users_addresses AS ua ON (u.id = ua.user_id)
            LEFT JOIN users_contact_means AS ucm ON (u.id = ucm.user_id AND ucm.mean_id="1")
			
            WHERE g.customer  = "'.$user->id.'"'.($user->provider == 1 ? ' OR g.provider = "'.$user->id.'" ' : '');
			$q.= ' GROUP BY g.id ';
			
		
			

            $results = DB::select($q, array());
			
			

            return View::make('jobs')->with('gigs', $results);
        }

        return redirect('registration');

    }
	
	
	public function acceptJob($id){

        $user = Auth::user();
        $job = Job::findOrFail($id);
		
		
		
        if($user->id == $job->provider){

            DB::table('jobs')
            ->where('id', $id)
            ->update(array('confirmed' => 1));
			
            return redirect('jobs');
        }

        return redirect('registration');

    }
	
	public function createJob(Request $request){

        $user = Auth::user();

        if($user){

            $description = $request->input('description');
        
			$job = new Job();
			$job->provider = $request->input('provider');
			$job->customer = $user->id;
			$job->description = $description;
			$job->save();
			
            return redirect('jobs');
        }

        return redirect('registration');

    }
	
	
	public function declineJob($id){

        $user = Auth::user();
         $job = Job::findOrFail($id);
		
        if($user->id == $job->provider){

            DB::table('jobs')
            ->where('id', $id)
            ->update(array('declined' => 1));
			
            return redirect('jobs');
        }

        return redirect('registration');

    }
	
	public function completeJob(Request $request){

        $user = Auth::user();
        $job = Job::findOrFail($request->input('job'));
		 
		 

		
        if($user->id == $job->customer){


            DB::table('jobs')
            ->where('id', $job->id)
            ->update(array('done' => "1"));
			
			
			if($request->input('star')){
			
				$rating = new Rating();
				$rating->rating = $request->input('star');
				$rating->provider = $request->input('provider');
				$rating->customer = $user->id;
				$rating->job = $job->id;
				$rating->save();

			}
			
            return redirect('jobs');
        }


        return redirect('registration');

    }
	
	public function showRegistration(){
		
		return Auth::user() ? redirect('map') : View::make('registration');

    }



}