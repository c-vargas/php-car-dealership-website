
<?php
	class Company {
    private $company_name = "Vargas Bros Auto Dealership";
    private $company_address = "18230 Tarzana Blvd";
    private $company_citystatezip = "Tarzana, CA 91356";
	private $company_url = 'http://cvargascoc2.infinityfreeapp.com';
	private $company_email = "cnvargas@my.canyons.edu";
    protected $whichpage="home"; // determines which page to display, defaults to "home"
	
		function getHeader(){
			$head = "<div class=\"header\">\n";
			$head .= "<h1>$this->company_name</h1>\n";
    		$head .= "</div>";
    		return $head;
		} // end of function getHeader

		function getFooter(){
			$footer = "<div class=\"footer\">";
        	$footer .= "$this->company_name, $this->company_address, $this->company_citystatezip";
        	$footer .= "</div>";
        	return $footer;
		} // end of function getFooter

	} // end of class company
?>
