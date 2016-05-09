<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php'); // including service class to work with database

$bhai = '';


   

    $aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM `singer` "); // taking info about all items from database

foreach ($aItems as $i => $aItemInfo) 
  {    
    $s =$aItemInfo['path'];
    $co =$aItemInfo['name'];
   
   
   
   
    
    
   
   

     $bhai.='
              
            
            <li>
               <img id="kill" src="'.$s.'" width="110" height="117" title="'.$co.'"/>
            </li>
               
       ';
}
?>



<html>

<body>
  

</body>
</html>
