<?php
if (isset(getallheaders()["Syn-Fingerprint"])) {

$HWID = getallheaders()["Syn-Fingerprint"];
echo $HWID;
}
?>