<?php

/*************   global  variables  ******************************/
  $company_name = "Vargas Bros Auto Dealership";
  $company_address = "18230 Tarzana Blvd";
  $company_citystatezip = "Tarzana, CA 91356";
  $car_array = array();
	$company_url = 'http://cvargascoc2.infinityfreeapp.com';
	$company_email = "cnvargas@my.canyons.edu";
/*************   end global  variables  **************************/


require_once('carDealerClass.php');
$carobject = new CarDealer();


// in order to determine if debugging is turned on or off
if (!empty($_REQUEST['debug'])) {
	$debug = true;
	print "DEBUG turned ON<br>";
}
else {
	$debug = false;
}

/*---------------- Lab 6 functions --------------------------*/

	function getHeader($company_name){
    $head = "<table style='background-color: DodgerBlue; width: 100%; text-align: center'><tr><td>";
    $head .= "<h1 style='text-align:center'> $company_name </h1>";
    $head .= "</td></tr></table>";
    return $head;
	} // end of getHeader

	function getFooter(){
		global $company_name;
		global $company_address;
		global $company_citystatezip;

		$footer = "<table style='background-color: DodgerBlue; width: 100%; text-align: center'><tr><td>";
		$footer .= "$company_name, $company_address, $company_citystatezip";
		$footer .= "</td></tr></table>";
		return $footer;

	} // end of getFooter



/*---------------- Lab 5 functions --------------------------*/

    # creates array for a Real Estate Web site
function  create_array_cars()
{
    global $car_array;
    $car_array = array();
    $car_array[] = "ID: 12345, Vehicle: 2002 Ford Ranger, $6500.00, Excellent condition, low 68000 miles" ;
    $car_array[] = "ID: 45678, Vehicle: 1998 Chevy Corvette, $19995.00, Low miles 54000, Great car 4 cruising" ;
    $car_array[] = "ID: 67890, Vehicle: 2000 Toyota Camry, $9990.00, Mom wants you 2 buy a conservative car" ;
    $car_array[] = "ID: 89123, Vehicle: 1995 Honda Civic, $4500.00, 140000 miles, but a Honda, it will last" ;
}  // end of create_array_cars

	function displayProduct($local_array){
		global $car_array;

		print "<table border='1'><tr><td><h1> Weekly Specials </h1></td></tr>";


  foreach ($local_array as $cars_listed) {
          print "<tr><td> $cars_listed </td></tr>";
	}

	print "</table>";

	} // end of displayProduct

// create_array_cars();
// displayProduct($car_array);



// ----------------------------------   Lab 4   --------------------------------

  display_company_name($company_name);   // parameter to pass input to function

  display_company_address();             // global variable to pass input to function

  function display_company_name($local_name) {
    //print "<h1> $local_name </h1>";
    $local_name = "Vargas Bros Auto Dealership";
  }

  function  display_company_address() {
    global $company_name;
		global $company_address;
		global $company_citystatezip;
 //   echo "<span style=\"text-decoration: underline; font-weight: bold;\"> $company_name, $company_address,  $company_citystatezip </span>";
  }

?>

<!DOCTYPE html>

<html>
	<head>
	<title>
			<?php
			display_company_name($company_name);
			?>
	</title>

		<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300&display=swap" 	rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="cars_style.css" type="text/css">

	</head>
	<body>
		<?php
			echo $carobject->getHeader();
			$carobject->create_navbar_array();
			$carobject->setWhichPage();
			echo $carobject->getLeftNavBar('menuLeft');

		?>

		<div  class="body">

	<?php
		echo $carobject->getMainSection();

		if ((!isset($_GET['whichpage'])) || ($_GET['whichpage'] == 'home'))
			{
			create_array_cars();
			echo $carobject->displaySpecials();
		//displayProduct($car_array);
		}

		echo "</div>";
		echo "<div style=\"clear: both;\">";
		echo "<div style=\"text-align: center\" class=\"footerWrapper\">\n";

		echo $carobject->getFooter();
		echo "\n<br />\n";
		echo "<div class=\"subFooter\">\n";
		echo "This is a non-commercial web site created by Christian Vargas for a PHP course at College of the Canyons. <br />\n";
		echo "<br />\n";

		echo "<a href='http://cvargascoc2.infinityfreeapp.com/'>Debug OFF</a> | <a href='http://cvargascoc2.infinityfreeapp.com/?debug=true'>Debug ON</a>";
		echo "</div>\n";
		echo "</div>\n";
	?>
	</body>
</html>