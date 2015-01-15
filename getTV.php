<?php
$tv = isset( $tv ) ? $tv : "pagetitle";
	$doc = isset( $doc ) ? $doc : 1;
	$tvObj = $modx->getTemplateVar( $tv, "*", $doc );

	return $tvObj["value"];
?>
