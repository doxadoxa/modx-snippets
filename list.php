<?php
/***
List snippet by Doxa

Use [[List? &tv=`elem 1||elem 2||elem 3..`]] and get ul-li list

Params: 
&tv - list from tv
&outerTpl - outer element, default <ul>[+list+]</ul>. When change outer element use [+list+] to detect list position.
&rowTpl - list element, default <li>[+text+]</li>. When change outer element use [+text+] to detect text position.
&separator - default ||. 
***/

$tv = isset( $tv ) ? $tv : NULL;
$separator = isset( $separator ) ? $separator : "||";

$outerTpl = isset( $outerTpl ) ? $outerTpl : "<ul>[+list+]</ul>";
$rowTpl = isset( $rowTpl ) ? $rowTpl : "<li>[+text+]</li>";

if ( $tv != NULL ) {

	$list = explode($separator, $tv);
		
	if ( is_array( $list ) ) { 
		$innerList = "";
		
		foreach( $list as $lElement ) {
			$innerList .= str_replace("[+text+]", $lElement, $rowTpl);
		}
	}
		
	return str_replace("[+list+]", $innerList, $outerTpl);
}
?>
