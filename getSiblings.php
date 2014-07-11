<?php
$id = isset( $id ) ? $id : 0;
$dir = isset( $dir ) ? $dir : 'next';

$parent = $modx->getParent( $id );
//1 is depth
$siblings = $modx->getChildIds( $parent['id'], 1 );

if ( $dir == 'prev' ) {
	$prev = -1;
	foreach( $siblings as $alias => $siblingId ) {
		if( $siblingId == $id ) {
			if ( $prev == -1 ) {
				return array_pop( $siblings );
			} else {
				return $prev;
			}
		}
		$prev = $siblingId;
	}
} else if ( $dir == 'next' ) {
	$prevElem = -1;
	foreach( $siblings as $alias => $siblingId ) {
		if( $prevElem == $id ) {
			return $siblingId;
		}
		$prevElem = $siblingId;
	}
	return array_shift( $siblings );
}
?>
