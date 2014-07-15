<?php
/***
List snippet by Doxa

Use [[List? &tv=`elem 1||elem 2||elem 3..`]] and get ul-li list

Params: 
&tv - list from tv
&outerTpl - outer element, default <ul>[+list+]</ul>. When change outer element use [+list+] to detect list position.
&rowTpl - list element chunk, default @CODE:<li>[+text+]</li>. If you want use code in parametr use @CODE:SOMEHTML.  When change outer element use [+text+] to detect text position.
&separator - default ||.
&depth - depth of list, use when list separate with many seporators. Example: 1::First||2::Second||3::Third
Default depth is 1. Can be one or two. 
***/

$tv = isset( $tv ) ? $tv : NULL;
$separator = isset( $separator ) ? $separator : "||";

$outerTpl = isset( $outerTpl ) ? $outerTpl : "<ul>[+list+]</ul>";
$rowTpl = isset( $rowTpl ) ? $rowTpl : "@CODE:<li>[+text+]</li>";

$depth = isset( $depth ) ? $depth : 1;

$isRowTplIsCode = strpos( $rowTpl, "@CODE:");

if( $isRowTplIsCode !== false ) {
	$rowTpl = substr( $rowTpl, $isRowTplIsCode+6 );
} else {
	$rowTpl = $modx->getChunk( $rowTpl );	
}

if ( $tv != NULL ) {

	$list = explode($separator, $tv);
	
	if ( is_array( $list ) ) { 
		$innerList = "";

		if ( $depth == 1 ) {
			
			foreach( $list as $lElement ) {
				$innerList .= str_replace("[+text+]", $lElement, $rowTpl);
			}
			
		} else {
			
			foreach( $list as $lElement ) {
				$lElementVars = explode("::", $lElement);
				$varId = 0;
				$rowTemp = $rowTpl;
				
				foreach( $lElementVars as $var ) {
					$rowTemp = str_replace("[+" . $varId . "+]", $var, $rowTemp );
					++$varId;
				}
				
				$innerList .= $rowTemp;
			}
			 
		}
		
		return str_replace("[+list+]", $innerList, $outerTpl);
	}
}
?>
