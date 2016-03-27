<?php
include 'sqlconnect.php';

function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
    $earth_radius = 6371;

    $dLat = deg2rad($latitude2 - $latitude1);
    $dLon = deg2rad($longitude2 - $longitude1);

    $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
    $c = 2 * asin(sqrt($a));
    $d = $earth_radius * $c;

    return $d;
}


//get position from GET
	$lat=$_GET['lat'];
	$lon=$_GET['lon'];
	$maxdist=$_GET['maxdist'];
	$R=6371;
	$sort=$_GET['sort'];
//calculate squared radius of maxdist km
	$maxLat = $lat + rad2deg($maxdist/$R/cos(deg2rad($lat)));
	$minLat = $lat - rad2deg($maxdist/$R/cos(deg2rad($lat)));
	$maxLon = $lon + rad2deg($maxdist/$R/cos(deg2rad($lat)));
	$minLon = $lon - rad2deg($maxdist/$R/cos(deg2rad($lat)));
	if ($maxLat<-90) {$maxlat=-90;}
	if ($minLat<-90) {$minlat=-90;}
	if ($maxLon<-90) {$maxlon=-90;}
	if ($minLon<-90) {$minlon=-90;}
	if ($maxLat>90) {$maxlat=90;}
	if ($minLat>90) {$minlat=90;}
	if ($maxLon>90) {$maxlon=90;}
	if ($minLon>90) {$minlon=90;}
//get sql array
	$techguys=array();
	$sql="SELECT sel2.*, COALESCE(ROUND(AVG(ratings.rating)),0) as 'rating' FROM (SELECT sel1.*, count(jobs.id) as 'jobs' FROM (SELECT u.id, u.`firstname`, u.`lastname`, u.`description`, u.image, u.`weekday_from`, u.`weekday_to`, u.`weekend_from`, u.`weekend_to`, a.street, a.city, a.state, a.country, a.zip, a.latitude, a.longitude FROM `users` u, users_addresses a WHERE u.id=a.user_id AND latitude>=".$minLat." AND latitude<=".$maxLat." AND longitude>=".$minLon." AND longitude<=".$maxLon." AND provider=1) sel1 LEFT JOIN jobs ON sel1.id=jobs.provider GROUP BY jobs.provider) sel2 LEFT JOIN ratings ON sel2.id=ratings.provider GROUP BY ratings.provider";
	$conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            	$new_techguys = new StdClass();
		    	$new_techguys->id=$row['id'];
				$new_techguys->firstname=$row['firstname'];
				$new_techguys->lastname=$row['lastname'];
				$new_techguys->description=$row['description'];
				$new_techguys->image=$row['image'];
				$new_techguys->weekday_from=$row['weekday_from'];
				$new_techguys->weekday_to=$row['weekday_to'];
				$new_techguys->weekend_from=$row['weekend_from'];
				$new_techguys->weekend_to=$row['weekend_to'];
				$new_techguys->street=$row['street'];
				$new_techguys->city=$row['city'];
				$new_techguys->state=$row['state'];
				$new_techguys->country=$row['country'];
				$new_techguys->zip=$row['zip'];
				$new_techguys->latitude=$row['latitude'];
				$new_techguys->longitude=$row['longitude'];
				$new_techguys->jobs=$row['jobs'];
				$new_techguys->rating=$row['rating'];
				$new_techguys->distance=getdistance($lat,$lon,$row['latitude'],$row['longitude']);//distance in kilometres
				array_push($techguys, $new_techguys);
				unset($new_techguys);
		    }
        }
	$conn->close();
//sort by parameter
	function sortabc($a, $b)
	{
	    return strcmp($a->firstname, $b->firstname);
	}
	function sortjobs($a, $b)
	{
	    return $b->jobs-$a->jobs;
	}
	function sortrating($a, $b)
	{
	    return $b->rating-$a->rating;
	}
	function sortdistance($a, $b)
	{
	    return $a->distance-$b->distance;
	}


	if ($sort=='abc'){usort($techguys, "sortabc");}
	if ($sort=='jobs'){usort($techguys, "sortjobs");}
	if ($sort=='rating'){usort($techguys, "sortrating");}
	if ($sort=='distance'){usort($techguys, "sortdistance");}
//create json
	$results = new StdClass();
	$results->results=(object)$techguys;
	//$results->results_left=100;
	echo json_encode($results);
?>
