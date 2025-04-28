<?php
	function extractFolderNumber($path){
		$weekNr;
		$weekNrString = substr($path, -1);
		if (is_numeric($weekNrString)){
			$weekNr = (int) $weekNrString;
		}
		return $weekNr;
	}
?>