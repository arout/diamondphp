<?php

$oCache = new CacheAPC();
	
	if ($oCache->bEnabled) { // if APC enabled
	
	    $aMemData = $oCache->getData('my_object'); // getting data from memory
	    $aMemData2 = $oCache->getData('our_class_object'); // getting data from memory about our class
	
	    echo 'Data from memory: <pre>'; // lets see what we have from memory
	    print_r($aMemData);
	    echo '</pre>';
	
	    echo 'Data from memory of object of CacheAPC class: <pre>';
	    print_r($aMemData2);
	    echo '</pre>';
	
	    echo 'As you can see - all data read successfully, now lets remove data from memory and check results, click <a href="index3.php">here</a> to continue';
	
	} else {
	    echo 'Seems APC not installed, please install it to perform tests';
	}