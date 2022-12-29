<!DOCTYPE html>

<?php

if(isset($_POST["submit"])){
    $server = "localhost";
    $userName = "yashconstruction";
    $password = "yash@constructions06";

    $con = mysqli_connect($server, $userName, $password);

    $sql = "select * from `yashconstructions`.`leads`";

    $res = mysqli_query($con, $sql);

    $html = '<table><tr>
    <th>Name</th>
    <th>email</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Submit Time</th>
    </tr>';

    while ($row = mysqli_fetch_assoc($res)) {
        $html.='<tr><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['subject'].'</td><td>'.$row['message'].'</td><td>'.$row['time'].'</td></tr>';
    }
    $html.='</table>';

    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename=leads.xls');

    echo $html;
}



?>

<html lang="en">

<head>
    <title>Yash Constructions</title>
	<meta charset="utf-8">
	<link rel="icon" href="images/logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

    <div style="width: 100px;
	height: 100px;	
	position: absolute;
	top:0;
	bottom: 0;
	left: 0;
	right: 0;
  	
    margin: auto;">
    
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
        
                <input type="submit" value="Download excel file" class="btn btn-primary py-3 px-5" name="submit">
            </form>
   
     
        
    </div>
    
  </body>

</html>