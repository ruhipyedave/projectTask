<?php 

   include 'dbConnect.php';

	header("Content-Type: application/json; charset=UTF-8");
	$obj = json_decode($_POST["x"], false);


    $output = array();
    $output['projects'] = array();
    $usersArr = array();

	$sql = "select * from projects";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($output['projects'], ($row));

            $tmpUserArr = (array) json_decode($row['profile']);
            $usersArr = array_merge($usersArr, $tmpUserArr);
        }
        
        $usersArr = array_unique($usersArr);        
        $userIdStr = join(", ", $usersArr);
        
        //fetch only those users who are involved in the projects.
        $sql = "select * from users where id in ($userIdStr)";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
            $output['users'] = ($result->fetch_all(MYSQLI_ASSOC));
        
        $sql = "select * from forms";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0)
            $output['forms'] = ($result->fetch_all(MYSQLI_ASSOC));
    }

    $output = json_encode($output);
    
    echo $output

?>