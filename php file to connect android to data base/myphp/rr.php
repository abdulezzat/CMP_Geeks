
<?php

require_once '../includes/DBoperation.php';

	$Posts = array();
	$response = array();


	if($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$op = new operations();
		$result = $op->AllPosts();
		$NumberOfPosts = mysqli_num_rows($result);
		if($NumberOfPosts > 0)
		{
			$i = 1;
			while( $row = mysqli_fetch_assoc($result) )
			{
				$Posts[$i] = $row['Text'];
				$i++;

			}

			$response['error'] = false;
			$response['message'] = "succeeded";
			


		} 

	}
	else
	{
		$response['error'] = true;
		$response['message'] = "invalid request";
	}

	echo json_encode($response)."<br>";
	echo json_encode($Posts)."<br>";