<?php
/*! 
 * Just get MLS numbers from "current listings.html" file.
 * @author David England
 */



/**
 * Load current listings from file, want 3 items: title, price and MLS#
 * (for now, forego the short title here and use one in details page instead.)
 */
$details = file_get_contents( 'current listings.html' );
$doc = new DOMDocument();
//discard white space 
$doc->preserveWhiteSpace = false;
$doc->loadHTML( $details );

//the table by its tag name
$tables = $doc->getElementsByTagName( 'tbody' );

//get all rows from the table
$rows = $tables->item( 0 )->getElementsByTagName( 'tr' );
echo "array ( " . PHP_EOL;
// loop over the table rows
foreach ( $rows as $row ) {
    
    // get each column by tag name    
    $cols = $row->getElementsByTagName( 'td' );
     
        //Get MLS number and form link to mobile page about listing
        preg_match( '/NAMLS:\s*(\d+)$/m', $cols->item( 2 )->nodeValue, $matches );
        
        $mls = $matches[1];
    echo "\t $mls," . PHP_EOL;
}
echo ");";
?>
