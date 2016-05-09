<?php

if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE); 

require_once('classes/CMySQL.php'); // including service class to work with database

$chai = '';


   

    $aItems = $GLOBALS['MySQL']->getAll("SELECT * FROM `composer` "); // taking info about all items from database

foreach ($aItems as $i => $aItemInfo) 
  {    
    $s =$aItemInfo['path'];
    $co =$aItemInfo['name'];
   
   
   
   
    
    
   
   

     $chai.='
              
            
            <li>
               <img id="bill" src="'.$s.'" width="110" height="117" title="'.$co.'"/>
            </li>
               
       ';
}
?>



<html>

<body>
  

</body>
</html>
