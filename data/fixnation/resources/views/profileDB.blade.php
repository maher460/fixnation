<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="js/jquery-2.1.4.min.js">
    </head>
    <body>
        <div class="container">
<?

$user = Auth::user();
if ($user)
{
    

           ?>

            {!! Form::open(array('url' => 'profile/save', 'class' => 'form')) !!}

            <div class="form-group">
                {!! Form::label('First Name') !!}
                {!! Form::text('firstname', $user->firstname,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your name')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Last Name') !!}
                {!! Form::text('lastname',  $user->lastname,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your name')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Your E-mail Address') !!}
                {!! Form::text('email',  $user->email,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your e-mail address')) !!}
            </div>

            <div class="form-group">

                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Your e-mail address')) !!}

            </div>
            <div class="form-group">

                {!! Form::label('password_confirmation', 'Password confirmation')!!}
                {!! Form::password('password_confirmation', null,
                array('required',
                'class'=>'form-control',
                'placeholder'=>'Your e-mail address')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Provider') !!}
                {!! Form::checkbox('provider', null,
                    array('required',
                          'class'=>'form-control',
                          'placeholder'=>'Your message')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Mobile') !!}
                {!! Form::text('mobile', null,
                    array(
                          'class'=>'form-control',
                          'placeholder'=>'Your mobile')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Location') !!}
                {!! Form::text('address', null,
                    array(
                          'class'=>'form-control',
                          'placeholder'=>'Your mobile')) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Register',
                  array('class'=>'btn btn-primary')) !!}
            </div>
            {!! Form::close() !!}



<?}
else {
	echo "TERe";
	die();
	return redirect('registration');
} ?>
            </div>



    </body>

</html>
