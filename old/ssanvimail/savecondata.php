<?php      
 
    // include('config.php');  
    include('smtp/PHPMailerAutoload.php');
    // print_r($_POST);die();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $connum=$_POST['connum'];
    $msg=$_POST['msg'];
    $message="Thanks You for Contact Us";
    $admin_message="Thank You";

         // print_r($email);die();
    $data=array();
    if(empty($name)){
        $data['code']="404";
    $data['msg']="Please Enter  name.";
    }
 else if(empty($email)){
        $data['code']="404";
    $data['msg']="Please Enter email.";
    }

    else{
    $amsg="Name: $name <br/> Email: $email<br/> Phone: $phone<br/>Message: $admin_message<br/>";
   blastEmail($email,"Test Mail ",$message);
    // blastEmail("info@acceron.in",$subject,$amsg);
    $data['code']="200";
    $data['msg']="Thank you! Data submitted Succefully.";
    }
	
        	
        function blastEmail($to,$subject,$message){
	
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Host = "smtp.gmail.com";
            $mail->Port = "587";
            $mail->IsHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Username = "testmailcomp0@gmail.com";
            $mail->Password = 'vyqxuzjpoyyukuir';
            // define('SMTP_USERNAME','info@yashconstructions.co.in');
// define('SMTP_PASSWORD','constructions06');
            $mail->SetFrom("sales@acceron.in","AcceronInfo Tech");
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AddAddress($to);
            $mail->SMTPOptions = array('ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => false
            ));
            if (!$mail->Send()) {
                echo $mail->ErrorInfo;
            } else {
            
               $emailmsg="Your message has been sent. Thank you!";
            }
            }
            

		echo json_encode($data);	

        