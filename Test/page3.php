<?php
// create a new cURL resource
$credentials = "userid:password";
$url = "http://www.point-star.net/projects/devplasa2/trunk/template/admin/page2.php";

 $headers = array(
            //"POST ".$page." HTTP/1.0",
            "Content-type: text/xml;charset=\"utf-8\"",
            //"Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            //"SOAPAction: \"run\"",
            //"Content-length: ".strlen($xml_data),
            "Authorization: Basic " . base64_encode($credentials),
         "WWW-Authenticate: Basic " . base64_encode($credentials)
        );
   
///////////////////
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_USERAGENT, $defined_vars['HTTP_USER_AGENT']);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);         
        // Apply the XML to our curl call
        //curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data); 

        $data = curl_exec($ch); 

        if (curl_errno($ch)) {
            echo "Error: " . curl_error($ch);
        } else {
         echo "success?";
            // Show me the result
           // var_dump($data);
         //print_r($data);
//        // $echo "data result//////////<br>$data<br>//////////////////";
            curl_close($ch);
//        // $echo $data;
        }//////////////////
   
?> 
