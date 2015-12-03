<?php





class formula_object {

	public function  __construct($value1,$value2,$operator1) {
		$this->value1 = $value1;
		$this->value2 = $value2;
		$this->operator1 = $operator1;


	} // close out public construct function


	




	public function calculator1 () {

	if ($this->operator1=='plus') {

	$answer1=$this->value1+$this->value2;

	}

	if ($this->operator1=='minus') {
	$answer1=$this->value1-$this->value2;		
	}

	if ($this->operator1=='multiply') {
		$answer1=$this->value1*$this->value2;
		
	}

	if ($this->operator1=='divide') {

		$answer1=$this->value1/$this->value2;
		
	}
	
	return $answer1;

	} //close out function


} // close out class





if(!function_exists(pre)){
    function pre($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}











$gc_post='abc';

if( isset($_POST['gc_post']) ) {

$gc_post=$_POST['gc_post'];

}




?>

<html>
<body>

	<style>
	.container{
    margin:0px auto;
    width: 800px; 
    text-align: center;
    font-size: 20px;
}
	</style>

	<div class="container">
		<h1 style="text-align: center;">Gerard's API Checker</h1>

<?php



/*************** page 1 ********************/



if (!is_numeric($gc_post)) {


?>





Please enter your login info, username and password:
<form method="post" action="/index_kal_test3.php">


<input type="hidden" name="gc_post" value=2 />


<br/>

Username: <input type="text" id="username" name="username">
<br/><br/>

Password: <input type="text" name="password">
<br/><br/>

















<input type="submit" value="Submit" />

</form>

  







<?php
} // close out page 1

if ($gc_post==2) {

    
$username=$_POST['username'];
$password=$_POST['password'];




echo $username." - ".$password."<br/>";




/*
$data = array(
    'username' => 'gmanbooks456@gmail.com',
    'password' => 'pswd1234',
);

*/

$data = array(
    'username' => $username,
    'password' => $password,
);



$data = http_build_query($data); // convert array to urlencoded string


$gtoken='02323e21-ece5-40a8-92f4-c566a4630f6f';

$token_string="Authorization: Bearer ".$gtoken;


$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://ec2-52-23-201-115.compute-1.amazonaws.com:9090/api/users', //URL to the API
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_HEADER => true, // Instead of the "-i" flag
    CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded','Accept: application/json',$token_string) //Your New Relic API key
   
));


curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);



$resp = curl_exec($curl);

$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);


curl_close($curl); 






// put in second variable
$gman_resp=$resp;






// extract array string from response

$pos = strpos($gman_resp, "{");

/*
echo "<br/>".$pos;
*/
$gresp2=substr($gman_resp,$pos);




// decode into array
$gresp3=json_decode($gresp2, true);

?>

<?php

$gresp4=json_decode($gman_resp, true);

echo $gresp4;

print_r($gresp3);
echo "<br/>";
echo "<br/>";
echo "Response code is: ".$code."<br/>";
echo "<br/>";



/*

print_r($gresp3);

?>

<?php


echo "<br/>";
echo "ok";
echo "<br/>";

echo "username: ";
echo $gresp3[username];
echo "<br/>";
echo "array resp: ";
echo $gman_resp;
echo "array pos: ";
echo $pos;
echo "array resp gresp2: ";
echo $gresp2;
echo "array resp gresp3: ";
echo $gresp3;


echo "array resp: ";
print_r($gman_resp);
echo "array pos: ";
print_r($pos);
echo "array resp gresp2: ";
print_r($gresp2);
echo "array resp gresp3: ";
print_r($gresp3);

*/


?>

<a href="/index_kal_test3.php">Return to Page 1</a>











<?php


}




?>
</div>

</body>

</html>




















