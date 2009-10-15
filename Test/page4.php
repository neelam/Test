<?php
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_URL,"http://www.point-star.net/projects/devplasa2/trunk/template/admin/page2.php");
   curl_setopt($curl, CURLOPT_POST, 1);
   curl_setopt($curl, CURLOPT_POSTFIELDS, "Hello=World&Foo=Bar&Baz=Wombat");

   curl_exec ($curl);
   curl_close ($curl);
?>
