<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

include("trace.php");

include("body_1.php");
include("body_2.php");
include("body_3a.php");
include("body_3b.php");
include("zip.php");
include("bush.php");


?>




