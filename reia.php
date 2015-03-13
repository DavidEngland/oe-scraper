<?php
/*! 
 * New way of doing things
 * @author David England
 */

$state = 'AL'; //Alabama


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
/*
 *  Array to map North Alabama zip codes to city.
 */

$zip2city = array( "35016"=>"ARAB", "35019"=>"BAILEYTON", "35031"=>"BLOUNTSVILLE", "35033"=>"BREMEN", "35049"=>"CLEVELAND", "35053"=>"CRANE HILL", "35055"=>"CULLMAN", "35057"=>"CULLMAN", "35058"=>"CULLMAN", "35062"=>"DORA", "35077"=>"HANCEVILLE", "35083"=>"HOLLY POND", "35087"=>"JOPPA", "35098"=>"LOGAN", "35120"=>"ODENVILLE", "35121"=>"ONEONTA", "35131"=>"RAGLAND", "35146"=>"SPRINGVILLE", "35160"=>"TALLADEGA", "35175"=>"UNION GROVE", "35179"=>"VINEMONT", "35401"=>"TUSCALOOSA", "35501"=>"JASPER", "35504"=>"JASPER", "35540"=>"ADDISON", "35541"=>"ARLEY", "35553"=>"DOUBLE SPRINGS", "35565"=>"HALEYVILLE", "35570"=>"HAMILTON", "35572"=>"HOUSTON", "35578"=>"NAUVOO", "35601"=>"DECATUR", "35602"=>"DECATUR", "35603"=>"DECATUR", "35610"=>"ANDERSON", "35611"=>"ATHENS", "35612"=>"ATHENS", "35613"=>"ATHENS", "35614"=>"ATHENS", "35618"=>"COURTLAND", "35619"=>"DANVILLE", "35620"=>"ELKMONT", "35621"=>"EVA", "35622"=>"FALKVILLE", "35630"=>"FLORENCE", "35633"=>"FLORENCE", "35634"=>"FLORENCE", "35640"=>"HARTSELLE", "35643"=>"HILLSBORO", "35645"=>"KILLEN", "35647"=>"LESTER", "35648"=>"LEXINGTON", "35649"=>"MOORESVILLE", "35650"=>"MOULTON", "35651"=>"MOUNT HOPE", "35652"=>"ROGERSVILLE", "35653"=>"RUSSELLVILLE", "35654"=>"RUSSELLVILLE", "35660"=>"SHEFFIELD", "35670"=>"SOMERVILLE", "35671"=>"TANNER", "35672"=>"TOWN CREEK", "35673"=>"TRINITY", "35739"=>"ARDMORE", "35740"=>"BRIDGEPORT", "35741"=>"BROWNSBORO", "35742"=>"CAPSHAW", "35744"=>"DUTTON", "35745"=>"ESTILLFORK", "35746"=>"FACKLER", "35747"=>"GRANT", "35748"=>"GURLEY", "35749"=>"HARVEST", "35750"=>"HAZEL GREEN", "35751"=>"HOLLYTREE", "35752"=>"HOLLYWOOD", "35754"=>"LACEYS SPRING", "35755"=>"LANGSTON", "35756"=>"MADISON", "35757"=>"MADISON", "35758"=>"MADISON", "35759"=>"MERIDIANVILLE", "35760"=>"NEW HOPE", "35761"=>"NEW MARKET", "35763"=>"OWENS CROSS ROADS", "35764"=>"PAINT ROCK", "35765"=>"PISGAH", "35766"=>"PRINCETON", "35767"=>"RYLAND", "35768"=>"SCOTTSBORO", "35769"=>"SCOTTSBORO", "35771"=>"SECTION", "35772"=>"STEVENSON", "35773"=>"TONEY", "35774"=>"TRENTON", "35775"=>"VALHERMOSO SPRINGS", "35776"=>"WOODVILLE", "35801"=>"HUNTSVILLE", "35802"=>"HUNTSVILLE", "35803"=>"HUNTSVILLE", "35805"=>"HUNTSVILLE", "35806"=>"HUNTSVILLE", "35810"=>"HUNTSVILLE", "35811"=>"HUNTSVILLE", "35812"=>"HUNTSVILLE", "35816"=>"HUNTSVILLE", "35824"=>"HUNTSVILLE", "35895"=>"HUNTSVILLE", "35901"=>"GADSDEN", "35902"=>"GADSDEN", "35903"=>"GADSDEN", "35904"=>"GADSDEN", "35905"=>"GADSDEN", "35906"=>"RAINBOW CITY", "35907"=>"GADSDEN", "35950"=>"ALBERTVILLE", "35951"=>"ALBERTVILLE", "35952"=>"ALTOONA", "35953"=>"ASHVILLE", "35954"=>"ATTALLA", "35956"=>"BOAZ", "35957"=>"BOAZ", "35958"=>"BRYANT", "35959"=>"CEDAR BLUFF", "35960"=>"CENTRE", "35961"=>"COLLINSVILLE", "35962"=>"CROSSVILLE", "35963"=>"DAWSON", "35964"=>"DOUGLAS", "35966"=>"FLAT ROCK", "35967"=>"FORT PAYNE", "35968"=>"FORT PAYNE", "35971"=>"FYFFE", "35972"=>"GALLANT", "35973"=>"GAYLESVILLE", "35974"=>"GERALDINE", "35975"=>"GROVEOAK", "35976"=>"GUNTERSVILLE", "35978"=>"HENAGAR", "35979"=>"HIGDON", "35980"=>"HORTON", "35981"=>"IDER", "35983"=>"LEESBURG", "35984"=>"MENTONE", "35986"=>"RAINSVILLE", "35987"=>"STEELE", "35988"=>"SYLVANIA", "35989"=>"VALLEY HEAD", "36206"=>"ANNISTON", "36207"=>"ANNISTON", "36251"=>"ASHLAND", "36264"=>"HEFLIN", "36265"=>"JACKSONVILLE", "36266"=>"LINEVILLE", "36271"=>"OHATCHEE", "36272"=>"PIEDMONT", "36279"=>"WELLINGTON", "36530"=>"ELBERTA", "36775"=>"SARDIS"); 

// array mapping from iHomeFinder to dsIDXpress
$property_type = array( 
    "CND" => "2956", 
    "SFR" => "2959",
    "LL"  => "2952",
    "RI"  => "2953",
    "COM" => "2951"
);

function tcase ( $str ) { return ucwords( strtolower( trim( $str ) ) ); }

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
    echo "\t\t" . meta_key( $str_key ) . PHP_EOL;
    echo "\t\t" . meta_value( $str_value ) . PHP_EOL;
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


ob_start();
//include header for WordPress (WP) import
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
echo PHP_EOL;
// loop over the table rows
foreach ( $rows as $row ) {
    
    // get each column by tag name    
    $cols = $row->getElementsByTagName( 'td' );
    //  echo $cols->item(0)->nodeValue .PHP_EOL; 
    $city_pat = '/UNION GROVE/i';
//    echo $city_pat . PHP_EOL;
    if ( !preg_match( $city_pat, $cols->item( 0 )->nodeValue ) ) {
        
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
        //        echo $address . PHP_EOL;        
        $title_pat = '/\s*(.*)\s*/';
/**
        if ( preg_match( $title_pat, strip_tags(trim($address->item(0)->nodeValue)), $matchs) ) {
        echo $matchs[0] . PHP_EOL;
        echo $matchs[1] . PHP_EOL;
        echo $matchs[2] . PHP_EOL; 
        }
*/
        //         print_r($matchs);
        $link = $cols->item( 4 )->getElementsByTagName( 'a' )->item( 0 )->getAttribute( 'href' );
        //        $content .= $link . PHP_EOL;
        //        echo $link . PHP_EOL;
        $title = split( '/', $link );
        //        print_r($title);
        $new_title = str_replace( '-', ' ', $title[4] );  
        
        preg_match('/.*(\d{5})$/',$new_title,$matches);
//        echo $matches[1].PHP_EOL;
        $zip = $matches[1];
//        echo $zip2city[$zip].PHP_EOL;
        $city = $zip2city[$zip];
        
        $arows = $xpath->query( '//*[@id="detail-features"]/ul/li/div' );
        $info = array( );
        foreach ( $arows as $arow ) {
            $divs = $arow->getElementsByTagName( 'div' );
            $label = trim( $divs->item( 0 )->nodeValue );
            $value = trim( $divs->item( 1 )->nodeValue );
            $info[$label] = $value;
        } //$arows as $arow
        
        $title_pat = '/(.*)\s*'.$city.'\s*'.$state.'\s*(\d{5})/';
        preg_match($title_pat, $new_title, $matches);
//                print_r($matches);
        list(, $arr['street'],  $arr['zip']) = $matches;

        $new_title = tcase( $arr['street'] );
        $new_title .= ', '.tcase( $city );
        $new_title .= ' '.$state;
        $new_title .= ' '. $arr['zip'];
        // echo the values  
        echo "<item>\n";
        $content = '<div itemscope itemtype="http://schema.org/Place">' . PHP_EOL;
        if ( $info[$labels[13]] === 'SFR' )
            $content = '<div itemscope itemtype="http://schema.org/SingleFamilyResidence">' . PHP_EOL;
        if ( $info[$labels[13]] === 'RI' )
            $content = '<div itemscope itemtype="http://schema.org/ApartmentComplex">' . PHP_EOL;
        if ( $info[$labels[13]] === 'CND' )
            $content = '<div itemscope itemtype="http://schema.org/Residence">' . PHP_EOL;
        $link = "/idx/mls-$mls-";
        $content .= '<h2><a href="' . $link . '" title="' . $new_title . '" class="btn btn-default btn-large" itemprop="url">MLS Details for ' . $new_title . "</a></h2>\n";
        //        echo $address . PHP_EOL;
        //Description as excerpt
        $desc = trim( $xpath->query( '//*[@id="detail-remarks"]' )->item( 0 )->nodeValue );
        $content .= PHP_EOL . '<div itemprop="description">[idx-listing mlsnumber="' .$mls. '" showpricehistory="true" showschools="true" showfeatures="true"]</div>'.PHP_EOL;
        cwrap_it( 'excerpt:encoded', $desc );

//        echo $new_title;
        $content .= '   <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">' . PHP_EOL;
        $content .= '       <meta itemprop="streetAddress" content="' . $arr['street'] . '" />' . PHP_EOL;
        $content .= '       <meta itemprop="addressLocality" content="' . $city . '" />' . PHP_EOL;
        $content .= '       <meta itemprop="addressRegion" content="' . $state . '" />' . PHP_EOL;
        $content .= '       <meta itemprop="postalCode" content="' . $arr['zip'] . '" />' . PHP_EOL;
        $content .= '   </div>' . PHP_EOL;
        $content .= '   <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">' . PHP_EOL;
        $content .= '       <meta itemprop="latitude" content="' . $info[$labels[1]] . '" />' . PHP_EOL;
        $content .= '       <meta itemprop="longitude" content="' . $info[$labels[2]] . '" />' . PHP_EOL;
        $content .= '   </div>' . PHP_EOL;
        $content .= '</div><!-- Place -->' . PHP_EOL;
        wrap_it( 'wp:post_name', $title[4] );

        
        wrap_it( 'title', $new_title );
        //        echo "		<dc:creator><![CDATA[Mikko]]></dc:creator>\n";
        //Need to change for multiple users.
        cwrap_it( 'dc:creator', 'Mikko' );        
        echo cwrap_it( 'content:encoded', $content );
        //        foreach( $labels as $label ) echo $label . " = " . $info[$label].PHP_EOL;
        do_coords( $info[$labels[1]], $info[$labels[2]] );
        post_meta( '_price', $price );
        post_meta( '_property_id', $mls ); //wpcasa
        post_meta( '_listing_id', $mls ); //wpsight
/**
 * Special processing because lots do not have beds nor baths.  Also, must do something about partial baths.
 */
        
//*[@id="detail-info"]/b[1]        Beds
//*[@id="detail-info"]/b[2]        Baths (full)
//*[@id="detail-info"]/b[3]        home sq ft
//*[@id="detail-info"]/b[4]        
        
        if ( $info[$labels[14]] === 'LOT' ) {
            
            // No beds nor baths for lots.
            post_meta( '_listings_label', 'lots' );
        } //$info[$labels[14]] === 'LOT'
        else {
            //Should have beds and baths if not a lot.
            post_meta( '_listings_label', 'featured' );
            $bs = $xpath->query('//*[@id="detail-info"]/b');
            $i=0;
            $detail_info = array();
            foreach ( $bs as $b ) {
                $detail_info[]=$b->nodeValue;
                $i++;
            }
            post_meta( '_details_1', $detail_info[0] );
            if ( $i == 4 ) {
                post_meta( '_details_2', $detail_info[1].'|'.$detail_info[2] ); 
                post_meta( '_details_4', str_replace(',','',trim($detail_info[3])));             
                
            } else {
                post_meta( '_details_2', $detail_info[1] );
                post_meta( '_details_4', str_replace(',','',trim($detail_info[2])));
                
            }
        }
/*
 *  Ignore Extra Details for now.
 *        //Extra Details
        post_meta( '_details_4', $info[$labels[7]] ); //Lot size acres
        post_meta( '_details_5', $info[$labels[5]] ); //Electric
        post_meta( '_details_6', $info[$labels[6]] ); //Exposure Faces
        post_meta( '_details_7', $info[$labels[9]] ); //Zoning
        post_meta( '_details_8', $info[$labels[8]] ); //Dimensions 
        
*/
        post_meta( '_map_address', $new_title . ', USA' );
 //       post_meta( '_map_location', $new_title . ', USA' );
        post_meta( '_map_note', $info["Directions"] );
        post_meta( '_yoast_wpseo_focuskw', $new_title );
        $seo_desc = 'Alabama MLS ' . $mls . ' ' . $info[$labels[7]] . ' acre ' . $info[$labels[14]] . ' ' . $cols->item( 1 )->nodeValue . ', ' . $info[$labels[9]] . ' ' . $new_title;
        post_meta( '_yoast_wpseo_metadesc', $seo_desc );

        //Some more import template stuff, main thing is the 'property' custom post type.
        include 'post_stuff.php';
 
        echo "</item>\n";
    } //preg_match( "/$city/i", $cols->item( 0 )->nodeValue ) or NOT.
} //$rows as $row
echo "</channel>\n
</rss>";
ob_flush();
?>
