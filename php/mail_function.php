<?php

function sendconfirmation($email,$message_body,$late_entry_id,$status) {
  require('phpmailer/class.phpmailer.php');
  require('phpmailer/class.smtp.php');

  if($status == 'Accepted')
  {
    $message_body = $message_body . '<br><br><img src="https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=' . $late_entry_id . '&chld=H|2"><br><br><p>--<br>Regards,<br>MyLeave(Pearson Hardman)<br>+91 XXXXX XXXXX</p>';
  }
  else
  {
    $message_body = $message_body . '<br><br><p>--<br>Regards,<br>MyLeave(Pearson Hardman)<br>+91 XXXXX XXXXX</p>';
  }
  
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "tls";
  $mail->Port     = 587;
  $mail->Mailer   = "smtp";
  $mail->Host     = "smtp.gmail.com"; // For Gmail

  $mail->Username = "Your Email";
  $mail->Password = "Your Password";
  
  $mail->SetFrom("Your Email","your/Organization Name");
  $mail->AddAddress($email);
  $mail->Subject = "Late Entry Confirmation";
  $mail->MsgHTML($message_body);
  $mail->IsHTML(true);  
  $result = $mail->Send();
  return $result;
 }
?>