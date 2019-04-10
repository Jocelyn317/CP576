<?php
	//https://www.dictionaryapi.com/products/api-school-dictionary
  // This function grabs the definition of a word in XML format.
  
  	function grab_xml_definition ($word, $ref, $key) {
    	$uri = "https://www.dictionaryapi.com/api/v3/references/" . urlencode($ref) . "/json/" . urlencode($word) . "?key=" . urlencode($key);
    	return file_get_contents($uri);
  	};

  	//$xdef = grab_xml_definition($word, "collegiate", "0f6d6cc2-4d27-44fa-9686-e678e04ea2db");

?>