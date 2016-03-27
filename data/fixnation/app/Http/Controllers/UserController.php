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
use Redirect;
use Illuminate\Support\MessageBag;
use App\Rating;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller {


    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile()
    {
		
		$user = Auth::user();
        

        if($user){
			
			$q='SELECT u.*, ua.*, ucm.value AS mobile
            FROM users AS u
            LEFT JOIN users_addresses AS ua ON (u.id = ua.user_id)
            LEFT JOIN users_contact_means AS ucm ON (u.id = ucm.user_id AND ucm.mean_id="1")
			WHERE u.id= "'.$user->id.'"';


            

            $results = DB::select($q, array());

            return View::make('profile')->with('userArray', $results);
        }

        return redirect('registration');
		
		
       
    }


    public function login(Request $request){

        if (Auth::user() || Auth::attempt(array('email' => $request->input('email'), 'password' => $request->input('password'))))
        {
			$user = Auth::user();			
            return redirect($user->provider == 1 ? 'jobs':'map');
        }
        else
        {
			$errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
            return redirect()->back()->withErrors($errors)->withInput(Input::except('password'));
        }
    }
	public function loginView(){
		return View::make('login');
    }
	
	public function logout(){
		Auth::logout();
		return redirect('/');
		
	}
	
	public function showRegistration(){
		return View::make('registration');
		
	}

    public function profileSave(Request $request){

        $user = Auth::user();

        if($user){

            $this->validate($request, [
                'firstname' => 'required|alpha_dash|min:2|max:32',
                'lastname' => 'required|alpha_dash|min:2|max:32',
                'email' => ($user->email == $request->input('email') ? '': 'unique:users').'|email|required',
				'image' => 'image|mimes:jpeg,bmp,png|max:200px',
                'mobile' => 'required',
                'address_name' => $request->input('provider') ? 'required':''
            ]);


        $user->firstname =  $request->input('firstname');
        $user->lastname =  $request->input('lastname');
        $user->email =  $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->provider =  $request->input('provider')?:0;
        $user->description = $request->input('description');
        $user->save();
		
		if(Input::file('image')){
			$user->image ? File::Delete('profile_images/'.$user->image):''; // delete current file
			$destinationPath = 'profile_images'; // upload path
			$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
			$fileName = 'user_'.$user->id.'.'.$extension; // renameing image
			Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
			$user->image = $fileName;
			$user->save();
        }

        if($request->input('mobile')){
			DB::table('users_contact_means')->where('user_id', '=', $user->id)->delete();
           $contactMean = new ContactMean();
           $contactMean->user_id = $user->id;
           $contactMean->mean_id = 1;
           $contactMean->value = $request->input('mobile');
           $contactMean->save();
        }

        if($request->input('address_name')){
			DB::table('users_addresses')->where('user_id', '=', $user->id)->delete();
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
		
			return redirect('map');
        }

        return redirect('registration');

    }



    public function createUser(Request $request){

        $this->validate($request, [
            'firstname' => 'required|alpha_dash|min:2|max:32',
            'lastname' => 'required|alpha_dash|min:2|max:32',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
			'image' => 'image|mimes:jpeg,bmp,png',
            'mobile' => 'required',
            'address_name' => $request->input('provider') ? 'required':''
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
        $user->save();

		if(Input::file('image')){
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
	
	public function giveFeedback(Request $request){
		
		$email ='';
		$description='';
		
		if(isset($data)){
			$email =$data['email'];
			$description =$data['description'];
		}
		
		$captcha = $request->input('g-recaptcha-response');

		$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfaDwoTAAAAAJX8vCue1Yq0gxvlzVck_T-HUTdT&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        
		if($response['success'] == false)
        {
			$data['email'] = $request->input('email');
			$data['description'] = $request->input('probdescription');
			return redirect()->back()->with('data', $data);
			//return Redirect::to('feedback')->with('data', $data);
			//return View::make('feedback')->with('usersData', $data);
          //return redirect('feedback' , array('data' => $data));
        }
		else {
			
		  $message = '<html><body><table width="90%" border="1"><tr><td width="10%"><strong>IP address:</strong></td><td width="90%" scope="col">'.$request->input('userip').'</td>';
          $message.='</tr><tr><td><strong>E-mail:</strong></td><td>'.$request->input('email').'</td></tr><tr><td><strong>City:</strong></td><td>'.$request->input('userloc_city').'</td></tr><tr><td>';
          $message.='<strong>Region:</strong></td><td>'.$request->input('userloc_region').'</td></tr><tr><td><strong>Country:</strong></td><td>'.$request->input('userloc_country').'</td></tr><tr><td><strong>';
          $message.='Device:</strong></td><td>'.$request->input('device').'</td></tr><tr><td><strong>Problem:</strong></td><td>'.$request->input('probdescription').'</td></tr><tr><td><strong>Browser:</strong>';
          $message.='</td><td>'.$request->input('userbrowser').'</td></tr><tr><td><strong>Screen width:</strong></td><td>'.$request->input('scrwidth').'</td></tr><tr><td><strong>Screen height:</strong>';
		  
          $message.='</td><td>'.$request->input('scrheight').'</td></tr></table></body></html>';
		
		
		
			$to = 'feedback@fixnation.co';

		  $subject = 'Fixnation feedback';

		  $headers = "From: " . 'Online form <fixnation@fixnation.co>' . "\r\n";
		  $headers .= "MIME-Version: 1.0\r\n";
		  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		  mail($to, $subject, $message, $headers);
		  return redirect('/');
			
		}
		
	

        
		 
        

    }



}