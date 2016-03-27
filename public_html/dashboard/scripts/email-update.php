<?php
include '../sqlconnect.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
              $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
              } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                  $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
              } else {
                  $ipaddress = $_SERVER['REMOTE_ADDR'];
              }

if (($ipaddress=='173.255.210.98') or ($ipaddress=='50.116.9.254') or ($ipaddress=='74.207.250.230') or ($ipaddress=='45.33.48.85'))
{

//report date
$date0 = new DateTime('now');
$currdate= $date0->format('l, d.m.Y');
//total user count
$usercount=array();
$sql = "SELECT count(*) FROM users GROUP BY provider ORDER BY provider ASC";
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
			    	array_push($usercount, $row["count(*)"]);
			    }
	        }
	        $technician_total=$usercount[1];
	        $customer_total=$usercount[0];
	        $allusers_total=$technician_total+$customer_total;
$conn->close();

//get last check
$sql = "SELECT DATE_FORMAT(rdate, '%d.%m.%Y %H:%i:%s') AS rdate2, fbcount FROM  last_report";
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
	            	$lastcheck= $row["rdate2"];
	            	$lastfb= $row["fbcount"];
			    }
	        }
$conn->close();

//new users
//$lastcheck='10.07.2015 10:00:00';
$newusers_id=array();
$newusers_firstname=array();
$newusers_lastname=array();
$newusers_email=array();
$newusers_provider=array();
$newusers_country=array();
$sql = "SELECT u.`id` , u.`firstname` , u.`lastname` , u.`email` , u.`provider` , u.`created_at`, a.`country` FROM  `users` u, `users_addresses` a WHERE u.ID=a.user_id AND u.created_at >= STR_TO_DATE(  '".$lastcheck."',  '%d.%m.%Y %H:%i:%s' ) ORDER BY  `created_at` ASC";
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
			    	array_push($newusers_id, $row["id"]);
			    	array_push($newusers_firstname, $row["firstname"]);
			    	array_push($newusers_lastname, $row["lastname"]);
			    	array_push($newusers_email, $row["email"]);
			    	array_push($newusers_provider, $row["provider"]);
			    	array_push($newusers_country, $row["country"]);
			    }
	        }
	        $technician_new=array_count_values($newusers_provider)[1];
	        $customer_new=array_count_values($newusers_provider)[0];
	        if (!$technician_new>0){$technician_new=0;}
	        if (!$customer_new>0){$customer_new=0;}
	        $allusers_new=$technician_new+$customer_new;
$conn->close();

//all jobs
$alljobs_id=array();
$alljobs_accepted=array();
$alljobs_declined=array();
$alljobs_done=array();
$sql = "SELECT id, confirmed, declined, done FROM `jobs` WHERE id>52 ORDER BY ID";
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
			    	array_push($alljobs_id, $row["id"]);
			    	array_push($alljobs_accepted, $row["confirmed"]);
			    	array_push($alljobs_declined, $row["declined"]);
			    	array_push($alljobs_done, $row["done"]);
			    }
	        }
	        $alljobs_total=count($alljobs_id);
	        $jobs_accepted=array_count_values($alljobs_accepted)[1];
	        $jobs_declined=array_count_values($alljobs_declined)[1];
	        $jobs_finished=array_count_values($alljobs_done)[1];
	        if (!$jobs_accepted>0){$jobs_accepted=0;}
	        if (!$jobs_declined>0){$jobs_declined=0;}
	        if (!$jobs_finished>0){$jobs_finished=0;}
	        
$conn->close();

//new jobs
$newjobs_id=array();
$newjobs_customer=array();
$newjobs_technician=array();
$newjobs_customer_email=array();
$newjobs_technician_email=array();
$newjobs_desc=array();
$sql = "SELECT j.id, CONCAT(u2.firstname,' ',u2.lastname) 'customer', u2.email 'customer_email', CONCAT(u1.firstname,' ',u1.lastname) 'technician', u1.email 'technician_email', j.description 'desc', j.confirmed, j.declined, j.done FROM `jobs` j, users u1, users u2 WHERE j.provider=u1.id AND j.customer=u2.id AND created_datetime>=STR_TO_DATE(  '".$lastcheck."',  '%d.%m.%Y %H:%i:%s' ) AND j.id>52 ORDER BY j.ID";
$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        }
	        $result = $conn->query($sql);
	        if ($result->num_rows > 0) {
	            while($row = $result->fetch_assoc()) {
			    	array_push($newjobs_id, $row["id"]);
			    	array_push($newjobs_customer, $row["customer"]);
			    	array_push($newjobs_technician, $row["technician"]);
			    	array_push($newjobs_desc, $row["desc"]);
			    	array_push($newjobs_customer_email, $row["customer_email"]);
			    	array_push($newjobs_technician_email, $row["technician_email"]);
			    }
	        }
	        $alljobs_new=count($newjobs_id);
	        
$conn->close();

//fb likes
$url='https://www.facebook.com/fixnation';
 
    // Query in FQL
    $fql  = "SELECT share_count, like_count, comment_count ";
    $fql .= " FROM link_stat WHERE url = '$url'";
 
    $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
 
    // Facebook Response is in JSON
    $response = file_get_contents($fqlURL);
    $fb_likes=(json_decode($response)[0]->like_count);
    $new_fb_likes=$fb_likes-$lastfb;



$message='<!doctype html>
<html style="font-family: sans-serif; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
    -ms-text-size-adjust: 100%; /* 2 */
    min-height: 100%;">
<head>';
$message.='  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Fixnation report</title>
</head>
<style>
p {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  font-weight: inherit;
  font-style: inherit;
  font-size: 100%;
  font-family: inherit;
  vertical-align: baseline;
}';
$message.='
body {
  background-color: rgb(255, 255, 255);
  font: 400 1em/1.38 Helvetica;
  color: rgb(0, 0, 0);
}

.accepted {
  float: left;
  clear: both;
  width: 100%;
  margin: 8px 0 0 -1.33073%;
  padding-top: 7px;
  font-size: 1.125em;
  font-weight: 400;
  line-height: 1.38;
  text-align: center;
  color: rgb(0, 0, 0);
}';
$message.='
.customers,
.technicians {
  float: left;
  clear: both;
  width: 100%;
  padding-top: 7px;
  font-size: 1.225em;
  font-weight: 700;
  line-height: 1.38;
  text-align: center;
  color: rgb(0, 0, 0);
}';
$message.='
.customers_table,
.technicians_table {
  float: left;
  clear: both;
  width: 100%;
  padding-top: 5px;
  padding-bottom: 5px;
  font-size: 1em;
  font-weight: 400;
  line-height: 1.38;
  text-align: center;
  color: rgb(41, 41, 41);
}
.customers_table a,
.technicians_table a,
.job_technician a,
.job_customer a{
	color: rgb(255, 138, 0);
	text-decoration: none;
}';
$message.='
.image {
  display: block;
  width: 83.3333333333%;
  max-width: 1000px;
  height: auto;
  margin: 0 auto;
  overflow: hidden;
}';
$message.='
.job_customer {
  float: left;
  width: 95%;
  padding: 5px;
  border-bottom: 1px dashed rgb(229, 123, 0);
  font-size: 1em;
  font-weight: 400;
  line-height: 1.38;
  color: rgb(41, 41, 41);
}';
$message.='
.job_desc {
  float: left;
  clear: both;
  width: 95%;
  padding: 5px;
  font-size: 1em;
  font-weight: 400;
  line-height: 1.38;
  color: rgb(41, 41, 41);
  overflow: scroll;
  height: 100px;
}';
$message.='
.job_technician {
  float: left;
  clear: both;
  width: 95%;
  padding: 5px;
  border-bottom: 1px dashed rgb(229, 123, 0);
  font-size: 1em;
  font-weight: 400;
  line-height: 1.38;
  color: rgb(41, 41, 41);
}';
$message.='
.jobs {
  position: relative;
  float: left;
  clear: both;
  width: 100%;
  min-width: 500px;
  padding-bottom: 35px;
  background-image: -webkit-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:    -moz-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:      -o-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:     -ms-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:         linear-gradient(360deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
}';
$message.='
.logohdr {
  position: relative;
  float: left;
  clear: both;
  width: 100%;
  min-width: 500px;
  height=auto;
  margin-top: 50px;
}';
$message.='
.one_job {
  display: block;
  width: 50%;
  min-width: 500px;
  margin: 5px auto;
  border: 1px solid rgb(255, 138, 0);
  border-radius: 10px;
  height: 180px;
}';
$message.='
.text {
  width: 214px;
  min-height: 35px;
  margin: 0 auto;
  font-size: 1em;
  font-weight: 400;
  line-height: 1.38;
  text-align: center;
  color: rgb(0, 0, 0);
}';
$message.='
.total_jobs,
.total_users {
  display: block;
  width: 100%;
  margin: 23px auto;
  font-size: 1.875em;
  font-weight: 400;
  line-height: 1.38;
  text-align: center;
  color: rgb(0, 0, 0);
}';
$message.='
.users {
  float: left;
  clear: both;
  width: 100%;
  min-width: 500px;
  padding-bottom: 35px;
  background-image: -webkit-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:    -moz-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:      -o-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:     -ms-linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
  background-image:         linear-gradient(360deg, rgb(255, 255, 255) 0%, rgb(215, 215, 215) 100%);
}';
$message.='
.job_desc a {
  border-top-width: 0;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 0;
  border-color: transparent;
  border-top-style: none;
  border-right-style: none;
  border-left-style: none;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  background-color: transparent;
  font-family: inherit;
  font-style: inherit;
  font-size: inherit;
  font-weight: inherit;
  text-transform: inherit;
  text-decoration: inherit;
  letter-spacing: inherit;
  word-spacing: inherit;
  color: inherit;
  opacity: 1;
  word-break: normal;
  word-wrap: normal;
  white-space: normal;
}';
$message.='
.total_jobs span {
  border-top-width: 0;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 0;
  border-color: transparent;
  border-style: none;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  background-color: rgba(255, 255, 255, 0);
  font-family: inherit;
  font-style: normal;
  font-size: inherit;
  font-weight: 700;
  text-transform: inherit;
  text-decoration: inherit;
  letter-spacing: inherit;
  word-spacing: inherit;
  color: rgb(31, 150, 59);
  opacity: 1;
  word-break: normal;
  word-wrap: normal;
  white-space: normal;
}';
$message.='
.total_users span {
  border-top-width: 0;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 0;
  border-color: transparent;
  border-style: none;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  background-color: transparent;
  font-family: inherit;
  font-style: normal;
  font-size: inherit;
  font-weight: 700;
  text-transform: inherit;
  text-decoration: inherit;
  letter-spacing: inherit;
  word-spacing: inherit;
  color: rgb(31, 150, 59);
  opacity: 1;
  word-break: normal;
  word-wrap: normal;
  white-space: normal;
}';
$message.='
</style>
<body class="body">
  <div class="logohdr">
    <img class="image" src="http://www.fixnation.co/dashboard/scripts/report-logo.png" alt="Fixnation Report">
    <p class="text">'.$currdate.'</p>
   </div>
  <div class="users">
    <p class="total_users">'.$fb_likes.' Facebook likes (<span>+'.$new_fb_likes.'</span>)</p>
  </div>';
  $message.='
  <div class="users">
    <p class="total_users">'.$allusers_total.' Users (<span>+'.$allusers_new.'</span>)</p>
    <p class="technicians">'.$technician_total.' Technicians (+'.$technician_new.')<br></p>
    <p class="technicians_table">';
    	for ($x = 0; $x < count($newusers_id); $x++) {
    		if ($newusers_provider[$x]==1){
				$message.='#'.$newusers_id[$x].' '.$newusers_firstname[$x].' '.$newusers_lastname[$x].' [<a href="mailto:'.$newusers_email[$x].'">e-mail</a>], '.$newusers_country[$x].'<br>';
			}
		}

    $message.='</p>
    <p class="customers">'.$customer_total.' Customers (+'.$customer_new.')<br></p>
    <p class="customers_table">';
    	for ($x = 0; $x < count($newusers_id); $x++) {
    		if ($newusers_provider[$x]==0){
				$message.='#'.$newusers_id[$x].' '.$newusers_firstname[$x].' '.$newusers_lastname[$x].' [<a href="mailto:'.$newusers_email[$x].'">e-mail</a>], '.$newusers_country[$x].'<br>';
			}
		}
    $message.='</p>
  </div>
  <div class="jobs">
    <p class="total_jobs">'.$alljobs_total.' Real jobs (<span>+'.$alljobs_new.'</span>)</p>
    <p class="text">Total accepted: '.$jobs_accepted.'</p>
    <p class="text">Total declined: '.$jobs_declined.'</p>
    <p class="text">Total finished: '.$jobs_finished.'</p><br><br>';
    	for ($x = 0; $x < count($newjobs_id); $x++) {
    		$message.='<p class="text">#'.$newjobs_id[$x].'</p><div class="one_job"> <p class="job_customer">Customer: '.$newjobs_customer[$x].' [<a href="mailto:'.$newjobs_customer_email[$x].'">e-mail</a>]</p>';	
    		$message.='<p class="job_technician">Technician: '.$newjobs_technician[$x].' [<a href="mailto:'.$newjobs_technician_email[$x].'">e-mail</a>]</p>';
    		$message.='<p class="job_desc">'.$newjobs_desc[$x].'</p></div><br>';
    	}
    
   $message.='</div>

</body>
</html>';
$to = 'fixnation@fixnation.co';

			$subject = 'Fixnation Report';

			$headers = "From: " . 'Fixnation Automailer <fixnation@fixnation.co>' . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
			mail($to, $subject, $message, $headers);


$sql = "UPDATE last_report SET rdate=now(), fbcount=".$fb_likes;
$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);
		          if(! $conn ){
		            die('Could not connect: ' . mysql_error());
		          }
		        $retval = mysqli_query( $conn, $sql );
		          if(! $retval ){
		            die('Could not enter data: ' . mysql_error(). ' '.$sql);
		          }
		          mysqli_close($conn);

echo 'Success';

}
echo('Forbidden IP address '.$ipaddress);

?>