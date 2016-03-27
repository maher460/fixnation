<?php
/*
Examples of usage:

GET LIST OF ALL ITEMS >>> http://fixnation.co/eshop/api.php?mode=getallitems
SEARCH WITHIN ITEMS >>> http://fixnation.co/eshop/api.php?mode=searchitems&title=mytitlesearch&desc=mydescriptionsearch
GET COUNT OF REGISTERED USERS >>> http://fixnation.co/eshop/api.php?mode=getusercount
*/
	$dbhost='sql13.dnsserver.eu';
	$dbuser='db75267xFN1';
	$dbpass='6s5f61mV';
	$dbbase='db75267xFN1';
	$ipaddress='';
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    	$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    else {
    	$ipaddress = $_SERVER['REMOTE_ADDR'];
        }

	if (isset ($_GET['mode'])){
//GET LIST OF ALL ITEMS
		if (strtolower($_GET['mode'])=='getallitems'){
			$base= mysqli_connect($dbhost,  $dbuser, $dbpass, $dbbase);
			if (mysqli_connect_errno())  die('Error >>> SQL could not connect: ' . mysql_error());
			//get information
			$return_arr = array();
			if ($result = mysqli_query( $base, "SELECT I.ID as 'ITEM_ID', I.title, I.description, I.price, C.ID as 'CAT_ID', C.name as 'CAT_TITLE' FROM eshop_items I, eshop_categories C WHERE I.category_id=C.ID" )){
    			while ($row = mysqli_fetch_assoc($result)) {
    				$row_array['ITEM_ID'] = $row['ITEM_ID'];
    				$row_array['ITEM_TITLE'] = $row['title'];
    				$row_array['ITEM_DESC'] = $row['description'];
    				$row_array['ITEM_PRICE'] = $row['price'];
    				$row_array['CAT_ID'] = $row['CAT_ID'];
    				$row_array['CAT_TITLE'] = $row['CAT_TITLE'];
    				array_push($return_arr,$row_array);
				   }
				}
			//record into log
			if ($base->query('INSERT INTO eshop_log (IP, method, params) VALUES ("'.$ipaddress.'", "getAllItems", "")') === FALSE) {
			    die('Error >>> Log SQL could not connect: ' . $conn->error);
			}
			mysqli_close($base);
			//output json
			echo json_encode($return_arr);
		}
//SEARCH WITHIN ITEMS
		else if (strtolower($_GET['mode'])=='searchitems'){
			if (isset($_GET['title'])){
				$sch_title='%'.strtolower($_GET['title']).'%';
			}
			else {
				$sch_title='%';
			}
			if (isset($_GET['desc'])){
				$sch_desc='%'.strtolower($_GET['desc']).'%';
			}
			else {
				$sch_desc='%';
			}
			$base= mysqli_connect($dbhost,  $dbuser, $dbpass, $dbbase);
			if (mysqli_connect_errno())  die('Error >>> SQL could not connect: ' . mysql_error());
			//get information
			$return_arr = array();
			if ($result = mysqli_query( $base, "SELECT I.ID as 'ITEM_ID', I.title, I.description, I.price, C.ID as 'CAT_ID', C.name as 'CAT_TITLE' FROM eshop_items I, eshop_categories C WHERE I.category_id=C.ID AND LOWER(I.title) LIKE '".$sch_title."' AND LOWER(I.description) LIKE '".$sch_desc."'" )){
    			while ($row = mysqli_fetch_assoc($result)) {
    				$row_array['ITEM_ID'] = $row['ITEM_ID'];
    				$row_array['ITEM_TITLE'] = $row['title'];
    				$row_array['ITEM_DESC'] = $row['description'];
    				$row_array['ITEM_PRICE'] = $row['price'];
    				$row_array['CAT_ID'] = $row['CAT_ID'];
    				$row_array['CAT_TITLE'] = $row['CAT_TITLE'];
    				array_push($return_arr,$row_array);
				   }
				}
			//record into log
			if ($base->query('INSERT INTO eshop_log (IP, method, params) VALUES ("'.$ipaddress.'", "searchItems", "title='.$sch_title.'\ndesc='.$sch_desc.'")') === FALSE) {
			    die('Error >>> Log SQL could not connect: ' . $conn->error);
			}
			mysqli_close($base);
			//output json
			echo json_encode($return_arr);
		}
//GET COUNT OF REGISTERED USERS
		else if (strtolower($_GET['mode'])=='getusercount'){
			$base= mysqli_connect($dbhost,  $dbuser, $dbpass, $dbbase);
			if (mysqli_connect_errno())  die('Error >>> SQL could not connect: ' . mysql_error());
			//get information
			$return_arr = array();
			if ($result = mysqli_query( $base, "SELECT COUNT(*) as 'USERCOUNT' FROM eshop_users WHERE is_admin=0" )){
    			while ($row = mysqli_fetch_assoc($result)) {
    				$row_array['usercout'] = $row['USERCOUNT'];
    				array_push($return_arr,$row_array);
				   }
				}
			//record into log
			if ($base->query('INSERT INTO eshop_log (IP, method, params) VALUES ("'.$ipaddress.'", "getUserCount", "")') === FALSE) {
			    die('Error >>> Log SQL could not connect: ' . $conn->error);
			}
			mysqli_close($base);
			//output json
			echo json_encode($return_arr);		
		}
		else echo 'Error >>> Mode not recognized!';
	}
	else echo 'Error >>> Mode not provided!';
?>

