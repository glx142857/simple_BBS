<?php 
	
	function valid_presence($field) {

		return isset($field) && trim($field) !== "";

	}

	function valid_equal($field1, $field2) {

		return isset($field1) && isset($field2) && $field1 === $field2;

	}

?>