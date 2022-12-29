<?php      
 
    // include('config.php');  
    include('smtp/PHPMailerAutoload.php');
    $name=$_POST['name'];
    $email=$_POST['email'];
    $connum=$_POST['connum'];
    $msg=$_POST['msg'];
    $subject=$_POST['subject'];
    $message="Hello,<br/><br/>

    Thank you for your inquiry. Our team will contact you shortly.<br/>
    If you’ve any questions, please reply to this email.<br/>
    <br/>
    
    Thank you.<br/>
    Warm Regards,<br/>
    Team Yash Constructions.";
    $admin_message="Thank You";


				$data=array();
		if(empty($name)){
			$data['code']="404";
		$data['msg']="Please Enter name.";
		}
	 else if(empty($email)){
			$data['code']="404";
		$data['msg']="Please Enter email.";
		}
		else if(empty($connum)){
			$data['code']="404";
		$data['msg']="Please enter contact number.";
		}

		else{

				// Insert into Database
                // $sql = "INSERT INTO `special_contact_form`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$subject','$admin_message')";
                // mysqli_query($con,$sql);
                $amsg="Name: $name<br/> Email: $email<br/>Contact Number: $connum<br/>Subject:$subject<br/>Message: $msg<br/>";
                blastEmail($email,"Welcome to Yash Constructions",$message);
                blastEmail("info@yashconstructions.co.in",'Yash Constructions',$amsg);
						$data['code']="200";
						$data['msg']="Thank you! Data submitted Succefully.";
		}			
        function blastEmail($to,$subject,$message){
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = false;
            $mail->SMTPSecure = 'None';
            $mail->Host = "relay-hosting.secureserver.net";
            $mail->Port = "25";
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "info@yashconstructions.co.in";
            $mail->Password = 'constructions06';
            $mail->SetFrom("info@yashconstructions.co.in","Yash Construction");
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AddAddress($to);
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            } else {
            
               $emailmsg="Your message has been sent. Thank you!";
            }
            }
            

		echo json_encode($data);	

        