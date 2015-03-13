<?php
/**
 * 
 * @author David England
 */
 $mls_numbers = array ( 
	 1006389,
	 977944,
	 837774,
	 874688,
	 1009439,
	 1011847,
	 919385,
	 1010186,
	 1008603,
	 1008662,
	 1008664,
	 1008665,
	 1008666,
	 1008708,
	 1008668,
	 1009077,
	 1009076,
	 1009078,
	 1008669,
	 1008670,
	 1008672,
	 1008654,
	 1008673,
	 1012944,
	 1008657,
	 1012829,
	 1008658,
	 1009209,
	 1008659,
	 1009181,
	 1008660,
	 1008661
);

        $url = 'http://www.realestate-huntsville.com/idx/mls-' . $mls_numbers[0] . '-';
        $details = file_get_contents( $url );
        $dom = new DOMDocument();
        //discard white space 
        $dom->preserveWhiteSpace = false;
        $dom->loadHTML( $details );       
        $xpath = new DOMXpath( $dom );

        $photos = $xpath->query('//*[@id="dsidx-property-types"]/text()');
        echo $photos->item(0)->nodeValue . PHP_EOL;

?>