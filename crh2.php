<?php
/*! 
 * New way of doing things
 * @author David England
 */

$city = "UNION GROVE";
$date_format = 'D, d M Y H:i:s +00000';

// Expected labes for MLS values
$labels = array(
     "County",
    "Latitude",
    "Longitude",
    "Subdivision",
    "Directions",
    "Electric",
    "Exposure Faces",
    "Lot Size in Acres",
    "Dimensions",
    "Zoning",
    "Elementary School",
    "Jr. High School",
    "High School",
    "Property Type",
    "Property SubType" 
);

// Few functions to aid in XML output
function cdata( $str )
{
    return '<![CDATA[' . $str . ']]>';
}
function meta_key( $str )
{
    return '<wp:meta_key>' . $str . '</wp:meta_key>';
}
function meta_value( $str )
{
    return '<wp:meta_value>' . cdata( $str ) . '</wp:meta_value>';
}

function post_meta( $str_key, $str_value )
{
    echo "\t<wp:postmeta>\n";
    echo "\t\t" . meta_key( $str_key ) . "\n";
    echo "\t\t" . meta_value( $str_value ) . "\n";
    echo "\t</wp:postmeta>\n";
}

function do_coords( $lat, $long )
{
    post_meta( '_map_geo', $lat . ',' . $long );
}

function wrap_it( $tag, $str )
{
    echo "\t\t<$tag>$str</$tag>\n";
}

function cwrap_it( $tag, $str )
{
    $str = cdata( $str );
    echo "<$tag>$str</$tag>\n";
}

function badger( $txt )
{
    $pat = '/(\d+)/m';
    
    $replace = '<span class="badge badge-info">$1</span>';
    
    return preg_replace( $pat, $replace, $txt );
}

ob_start();
include 'header.php';

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
echo "\n";
// loop over the table rows
foreach ( $rows as $row ) {
    
    // get each column by tag name    
    $cols = $row->getElementsByTagName( 'td' );
    //  echo $cols->item(0)->nodeValue ."\n"; 
    if ( preg_match( "/UNION GROVE/i", $cols->item( 0 )->nodeValue ) ) {
        // echo the values  
        echo "<item>\n";
        $content = '<div itemscope itemtype="http://schema.org/Place">' . "\n";
        
        $price = str_replace( '$', '', $cols->item( 1 )->nodeValue );
        $price = trim( str_replace( ',', '', $price ) );
        
        //Get MLS number and form link to mobile page about listing
        preg_match( '/NAMLS:\s*(\d+)$/m', $cols->item( 2 )->nodeValue, $matches );
        
        $mls = $matches[1];
        $url = 'http://www.idxre.com/m/listing/detail/74999/' . $mls . '/115/';
        $details = file_get_contents( $url );
        $dom = new DOMDocument();
        //discard white space 
        $dom->preserveWhiteSpace = false;
        $dom->loadHTML( $details );
        
        
        $xpath = new DOMXpath( $dom );
        //*[@id="detail-address"]
        $address = $xpath->query( '//*[@id="detail-address"]' );
        //        print_r($address->item(0)->nodeValue);
        //        echo $address . "\n";        
        $title_pat = '/\s*(.*)\s*/';
/**
        if ( preg_match( $title_pat, strip_tags(trim($address->item(0)->nodeValue)), $matchs) ) {
        echo $matchs[0] . "\n";
        echo $matchs[1] . "\n";
        echo $matchs[2] . "\n"; 
        }
*/
        //         print_r($matchs);
        $link = $cols->item( 4 )->getElementsByTagName( 'a' )->item( 0 )->getAttribute( 'href' );
        //        $content .= $link . "\n";
        //        echo $link . "\n";
        $title = split( '/', $link );
        //        print_r($title);
        wrap_it( 'wp:post_name', $title[4] );
        $new_title = str_replace( '-', ' ', $title[4] );
        wrap_it( 'title', $new_title );
        //        echo "		<dc:creator><![CDATA[Mikko]]></dc:creator>\n";
        cwrap_it( 'dc:creator', 'Mikko' );
        
        
        
        $content .= '<h2><a href="' . $link . '" title="' . $new_title . '" class="btn btn-default btn-large" itemprop="url">Full MLS Details for ' . $new_title . "</a></h2>\n";
        //        echo $address . "\n";
        //Description as excerpt
        $desc = trim( $xpath->query( '//*[@id="detail-remarks"]' )->item( 0 )->nodeValue );
        $content .= "\n" . '<div itemprop="description">' . badger( $desc ) . "</div>\n";
        cwrap_it( 'excerpt:encoded', $desc );
        
        // Form bootstrap carousel from listing images.
        $slides = $xpath->query( '//*[@class="cyclephoto"]' );
        $content .= '<div id="' . $mls . '" class="carousel slide" data-ride="carousel">' . "\n";
        
        $content .= '  <ol class="carousel-indicators hidden-print">' . "\n";
        $ccontent = '  <div class="carousel-inner">' . "\n";
        
        $links = array( );
        foreach ( $slides as $slide ) {
            $imgs = $slide->getElementsByTagName( 'img' );
            //*[@id="detail-remarks"]
            //*[@id="detail-features"]/ul/li[3]/div/div[2]        
            foreach ( $imgs as $img ) {
                $img_link = $img->getAttribute( 'src' );
                $links[] = $img_link;
                //          echo $img_link . "\n" ;          
            } //$imgs as $img
        } //$slides as $slide
        
        $i = 0;
        foreach ( $links as $link ) {
            if ( 0 == $i ) {
                $content .= '    <li data-target="#' . $mls . '" data-slide-to="' . $i . '" class="active"></li>' . "\n";
            } //0 == $i
            else {
                $content .= '    <li data-target="#' . $mls . '" data-slide-to="' . $i . '"></li>' . "\n";
            }
            $class = ( 0 == $i ) ? 'item active' : 'item';
            $ccontent .= '    <div class="' . $class . '"><img src="' . $link . '" alt="' . $new_title . " image-" . $i . '" itemprop="image"  />' . "\n";
            $ccontent .= '    </div>' . "\n";
            $i++;
        } //$links as $link
        $content .= '  </ol>';
        $content .= "\n";
        $content .= $ccontent;
        $content .= '</div><!-- .carousel-inner -->' . "\n";
        $content .= '</div><!-- .carousel -->' . "\n";
        
        $arows = $xpath->query( '//*[@id="detail-features"]/ul/li/div' );
        $info = array( );
        foreach ( $arows as $arow ) {
            $divs = $arow->getElementsByTagName( 'div' );
            $label = trim( $divs->item( 0 )->nodeValue );
            $value = trim( $divs->item( 1 )->nodeValue );
            $info[$label] = $value;
        } //$arows as $arow
        $content .= '   <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">' . "\n";
        $content .= '       <meta itemprop="latitude" content="' . $info[$labels[1]] . '" />' . "\n";
        $content .= '       <meta itemprop="longitude" content="' . $info[$labels[2]] . '" />' . "\n";
        $content .= '   </div>' . "\n";
        $content .= '</div><!-- Place -->' . "\n";
        echo cwrap_it( 'content:encoded', $content );
        //        foreach( $labels as $label ) echo $label . " = " . $info[$label]."\n";
        do_coords( $info[$labels[1]], $info[$labels[2]] );
        post_meta( '_price', $price );
        post_meta( '_listing_id', $mls );
        post_meta( '_details_4', $info[$labels[7]] ); //Lot size acres
        post_meta( '_details_5', $info[$labels[5]] ); //Electric
        post_meta( '_details_6', $info[$labels[6]] ); //Exposure Faces
        post_meta( '_details_7', $info[$labels[9]] ); //Zoning
        post_meta( '_details_8', $info[$labels[8]] ); //Dimensions      
        post_meta( '_map_address', $new_title . ', USA' );
        post_meta( '_map_note', $info["Directions"] );
        post_meta( '_yoast_wpseo_focuskw', $new_title );
        $seo_desc = 'Alabama MLS ' . $mls . ' ' . $info[$labels[7]] . ' acre ' . $info[$labels[14]] . ' ' . $cols->item( 1 )->nodeValue . ', ' . 'zoned ' . $info[$labels[9]] . ' ' . $new_title;
        post_meta( '_yoast_wpseo_metadesc', $seo_desc );
        if ( $info[$labels[14]] === 'LOT' ) {
            post_meta( '_listings_label', 'lots' );
        } //$info[$labels[14]] === 'LOT'
        else {
            post_meta( '_listings_label', 'featured' );
        }
        
        include 'post_stuff.php';
        echo "</item>\n";
    } //preg_match( "/UNION GROVE/i", $cols->item( 0 )->nodeValue )
} //$rows as $row
echo "</channel>\n
</rss>";
ob_flush();
?>