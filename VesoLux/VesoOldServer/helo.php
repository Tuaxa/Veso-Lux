<?php
function is_on($domain) {
  if(gethostbyname($domain) === gethostbyname("testillegaldomain.tld")) {
    return false;
  } else {
    return true;
  }
}

if (is_on("piroves.gq")) // site is down
{
    echo"Veso Lux Auth Server : Up";
}
else
 {
     echo"Veso Lux Auth Server : Down";
 }
?>
