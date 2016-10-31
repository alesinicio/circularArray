<?php

use alesinicio\circularArray;

require "circularArray.php";

// LET'S CREATE AN EXAMPLE ARRAY AND CONVERT IT INTO A CIRCULAR ARRAY.
$arrExample		= [1,2,3,4];
$arrCircular	= new circularArray($arrExample);

// GO THROUGH A LOOP. EACH ITERATION WILL PRINT THE CURRENT VALUE
// AND ADVANCE TO THE NEXT POSITION OF THE CIRCULAR ARRAY.
for ($i=0; $i<10; $i++) {
	echo $arrCircular->getCurrentValue();
	$arrCircular->next();
}

echo "<hr>";

// RESET THE ARRAY TO THE INITIAL POSITION.
$arrCircular->reset();

// GO THROUGH A LOOP. EACH ITERATION WILL PRINT THE CURRENT VALUE
// AND REWIND TO THE PREVIOUS POSITION OF THE CIRCULAR ARRAY.
// NOTE THAT HERE WE USE THE getCurrentValueAndRewind() METHOD,
// WHICH IS A WRAPPER FOR getCurrentValue() + previous().
for ($i=0; $i<10; $i++) {
	echo $arrCircular->getCurrentValueAndRewind();
}

echo "<hr>";

// WE CAN ALSO ADVANCE/REWIND "N" POSITIONS ON THE ARRAY
$arrCircular->reset();
echo $arrCircular->advancePosition(2);
echo $arrCircular->rewindsPosition(2);

echo "<hr>";

// MAYBE YOU WANT TO KNOW THE CURRENT INDEX OF THE ARRAY, NOT IT'S VALUE. COOL.
echo $arrCircular->getCurrentIndex();