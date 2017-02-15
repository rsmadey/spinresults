<?php



$input_correct = true;
/*
if(count($_POST) != 4){
	exit();// invalid request
}


$player_id = $_POST['id'];
$coins_bet = $_POST['bet'];
$coins_won = $_POST['winning']; // -1 will mean a lost run adn coins bet will be deducted
$hash = md5($_POST['hash']);
 */


//testing code
$player_id = 3;
$coins_bet = 5;
$coins_won = 10;
$hash = md5('joelsalt');



//check player id is a number and if the hash is a valid md5 with no escape characters for possible injections
if(!is_numeric($player_id) || !preg_match('/^[a-f0-9]{32}$/', $hash))
{
	$input_correct = false;
}
//ensure bets and winnings are both numerical.
//additional checks based on game could be added to check if the number bet and won was a valid option
if(!is_numeric($coins_bet) || $coins_bet < 1 || !is_numeric($coins_won) || $coins_won < -1)
{
	$input_correct = false;
}

//if all correct log spin
if($input_correct)
{
	//using variables for a local mysql instance
	$conn = mysqli_connect('127.0.0.1', 'rsmadey', 'tempPass', 'players');



	$response  = array();
	$query = 'SELECT id,name,credits,salt,lifetime_spins FROM player WHERE id = ' . $player_id;
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	$response['lifetime_spins'] = $row['lifetime_spins']+1;
	$response['name'] = $row['name'];
	$response['id'] = $row['id'];

	//ensure user has correct password
	if($hash != $row['salt'])
	{
		exit;//not correct user;
	}
	//ensure bet was valid
	if($coins_bet > $row['credits'])
	{
		exit;
	}
	//deduct if bet lost
	if($coins_won == -1)
	{
		$credits = $row['credits'] - $coins_bet;
	}else
	{
		$credits = $row['credits'] + $coins_won;
	}
	$response['credits'] = $credits;

	$response = json_encode($response);
	echo $response;
	return $response;
}





?>
