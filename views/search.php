
<?php

	require_once(dirname(__FILE__).'//..//classes/queries/queryToNumArray.php');
	require_once(dirname(__FILE__).'//..//classes/queries/countRowsNoLimit.php');
		$searchForm = '<div id="searchLabel"><p id="searchP"></p></div><div id="searchFormDiv"><form method="post" action="index.php?follow=0,search"><textarea id="searchTextArea" value="Search For Users" onclick="this.value = \'\';" onfocus="this.value = \'\';" rows="1" cols ="40"  autofocus=true class="input" type="textarea" name="search" required maxlength="60"></textarea><input type="submit" value="Search For Users" id="submitSearch"/></form></div>'; 
	
		echo $searchForm; 



?>