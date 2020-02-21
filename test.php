<?php
function teste($ip){
$retval=-1;
$output=array();
exec("ping $ip -n 2 -w 2 2>&1",$output,$retval);
echo "Return code: ".$retval."<br>\n";
//echo implode("<br>\n",$output);
}

