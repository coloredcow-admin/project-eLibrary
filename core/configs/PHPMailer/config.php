<?php
$mail->SMTPDebug = 0;                               
$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                    
$mail->SMTPAuth = true;                            
$mail->Username   = 'provisional.thdcihet@gmail.com';
$mail->Password   = 'Aa1357908642';              
$mail->SMTPSecure = 'ssl';  
$mail->Host = 'ssl://smtp.gmail.com:465';
$mail->Port = 465;   
$mail->setFrom('provisional.thdcihet@gmail.com', 'eLibrary | Do Not Reply');
$mail->isHTML(true);           
?>
