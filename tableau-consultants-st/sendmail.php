<?php
//include('mail/sendmail.php');
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$formno = $_POST['formno'];
$lead_source = $_POST['lead_source'];
$adminemail="casestudy@perceptive-analytics.com";



		$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
        $fields = array(
                                
                                'email'=>urlencode($email),
                                'name'=>urlencode($name),
                                'phone'=>urlencode($phone),
                                'lead_source'=>urlencode($lead_source),
                        
                                'oid' => '00D80000000c2J3', // insert with your id
                    			'debug' => '0',
                                'debugEmail' => urlencode("jayaram@igenero.com"), // your debugging email
                        );
        //print_r($fields); exit;
        //url-ify the data for the POST
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string,'&');
        
        //open connection
        $ch = curl_init();
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION, TRUE);
        
        //execute post
        $result = curl_exec($ch);
        
        //close connection
        curl_close($ch);
        die();


ini_set("SMTP", "aspmx.l.google.com");
ini_set("sendmail_from", $adminemail);

if($name!='' && $email!='' && $formno!='')
{
if($formno==1)
{
$fileurl='http://www.perceptive-analytics.com/wp-content/uploads/2016/08/AdWords-Spend-Optimizer.pdf';
$fileurl_name = pathinfo($fileurl);
$esubject = "Perceptive Analytics - Adwords Spend Optimization";
$emailtext = "<p>Hi ".$name.",</p>
<a href='".$fileurl."'>Click here</a> to download Adwords Spend Optimization document.";
}
if($formno==2)
{
$fileurl='http://www.perceptive-analytics.com/wp-content/uploads/2015/02/Markdown-Optimization-1.7.pdf';
$fileurl_name = pathinfo($fileurl);
$esubject = "Perceptive Analytics - Markdown Optimization";
$emailtext = "<p><b>Hi ".$name.",</b></p>
<a href='".$fileurl."'>Click here</a> to download Markdown Optimization document.";
}
if($formno==3)
{
$fileurl='http://www.perceptive-analytics.com/wp-content/uploads/2015/03/Marketing-Mix-Modeling.pdf';
$fileurl_name = pathinfo($fileurl);
$esubject = "Perceptive Analytics - Marketing Mix Mode";
$emailtext = "<p><b>Hi ".$name.",</b></p>
<a href='".$fileurl."'>Click here</a> to download Marketing Mix Mode document.";
}
$header  = 'MIME-Version: 1.0' . "\r\n";
$header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$header .= "From: Perceptive Analytics <$adminemail>" . "\r\n";
$header .= "Reply-To: $adminemail";
$userMail=mail($email, $esubject, $emailtext, $header);
echo $userMail;
}
else
echo 'Error';
?>

<!-- <script>
var a = $("<a>");
a.attr("href", "<?php //echo $fileurl; ?>").attr("download", "<?php //echo $fileurl_name['basename'] ?>").appendTo("body");
a[0].click();    
a.remove();
</script> -->