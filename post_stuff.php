<?php

$zip2county = array( "35016"=>"MARSHALL COUNTY", "35019"=>"CULLMAN COUNTY", "35031"=>"BLOUNT COUNTY", "35033"=>"CULLMAN COUNTY", "35049"=>"BLOUNT COUNTY", "35053"=>"CULLMAN COUNTY", "35055"=>"CULLMAN COUNTY", "35057"=>"CULLMAN COUNTY", "35058"=>"CULLMAN COUNTY", "35062"=>"JEFFERSON COUNTY", "35077"=>"CULLMAN COUNTY", "35083"=>"CULLMAN COUNTY", "35087"=>"CULLMAN COUNTY", "35098"=>"CULLMAN COUNTY", "35120"=>"ST CLAIR COUNTY", "35121"=>"BLOUNT COUNTY", "35131"=>"ST CLAIR COUNTY", "35146"=>"ST CLAIR COUNTY", "35160"=>"TALLADEGA COUNTY", "35175"=>"MARSHALL COUNTY", "35179"=>"CULLMAN COUNTY", "35401"=>"TUSCALOOSA COUNTY", "35501"=>"WALKER COUNTY", "35504"=>"WALKER COUNTY", "35540"=>"WINSTON COUNTY", "35541"=>"WINSTON COUNTY", "35553"=>"WINSTON COUNTY", "35565"=>"WINSTON COUNTY", "35570"=>"MARION COUNTY", "35572"=>"WINSTON COUNTY", "35578"=>"WALKER COUNTY", "35601"=>"MORGAN COUNTY", "35602"=>"MORGAN COUNTY", "35603"=>"MORGAN COUNTY", "35610"=>"LAUDERDALE COUNTY", "35611"=>"LIMESTONE COUNTY", "35612"=>"LIMESTONE COUNTY", "35613"=>"LIMESTONE COUNTY", "35614"=>"LIMESTONE COUNTY", "35618"=>"LAWRENCE COUNTY", "35619"=>"LAWRENCE COUNTY", "35620"=>"LIMESTONE COUNTY", "35621"=>"MORGAN COUNTY", "35622"=>"MORGAN COUNTY", "35630"=>"LAUDERDALE COUNTY", "35633"=>"LAUDERDALE COUNTY", "35634"=>"LAUDERDALE COUNTY", "35640"=>"MORGAN COUNTY", "35643"=>"LAWRENCE COUNTY", "35645"=>"LAUDERDALE COUNTY", "35647"=>"LIMESTONE COUNTY", "35648"=>"LAUDERDALE COUNTY", "35649"=>"LIMESTONE COUNTY", "35650"=>"LAWRENCE COUNTY", "35651"=>"LAWRENCE COUNTY", "35652"=>"LAUDERDALE COUNTY", "35653"=>"FRANKLIN COUNTY", "35654"=>"FRANKLIN COUNTY", "35660"=>"COLBERT COUNTY", "35670"=>"MORGAN COUNTY", "35671"=>"LIMESTONE COUNTY", "35672"=>"LAWRENCE COUNTY", "35673"=>"LAWRENCE COUNTY", "35739"=>"LIMESTONE COUNTY", "35740"=>"JACKSON COUNTY", "35741"=>"MADISON COUNTY", "35742"=>"LIMESTONE COUNTY", "35744"=>"JACKSON COUNTY", "35745"=>"JACKSON COUNTY", "35746"=>"JACKSON COUNTY", "35747"=>"MARSHALL COUNTY", "35748"=>"MADISON COUNTY", "35749"=>"MADISON COUNTY", "35750"=>"MADISON COUNTY", "35751"=>"JACKSON COUNTY", "35752"=>"JACKSON COUNTY", "35754"=>"MORGAN COUNTY", "35755"=>"MARSHALL COUNTY", "35756"=>"LIMESTONE COUNTY", "35757"=>"MADISON COUNTY", "35758"=>"MADISON COUNTY", "35759"=>"MADISON COUNTY", "35760"=>"MADISON COUNTY", "35761"=>"MADISON COUNTY", "35763"=>"MADISON COUNTY", "35764"=>"JACKSON COUNTY", "35765"=>"JACKSON COUNTY", "35766"=>"JACKSON COUNTY", "35767"=>"MADISON COUNTY", "35768"=>"JACKSON COUNTY", "35769"=>"JACKSON COUNTY", "35771"=>"JACKSON COUNTY", "35772"=>"JACKSON COUNTY", "35773"=>"MADISON COUNTY", "35774"=>"JACKSON COUNTY", "35775"=>"MORGAN COUNTY", "35776"=>"JACKSON COUNTY", "35801"=>"MADISON COUNTY", "35802"=>"MADISON COUNTY", "35803"=>"MADISON COUNTY", "35805"=>"MADISON COUNTY", "35806"=>"MADISON COUNTY", "35810"=>"MADISON COUNTY", "35811"=>"MADISON COUNTY", "35812"=>"MADISON COUNTY", "35816"=>"MADISON COUNTY", "35824"=>"MADISON COUNTY", "35895"=>"MADISON COUNTY", "35901"=>"ETOWAH COUNTY", "35902"=>"ETOWAH COUNTY", "35903"=>"ETOWAH COUNTY", "35904"=>"ETOWAH COUNTY", "35905"=>"ETOWAH COUNTY", "35906"=>"ETOWAH COUNTY", "35907"=>"ETOWAH COUNTY", "35950"=>"MARSHALL COUNTY", "35951"=>"MARSHALL COUNTY", "35952"=>"ETOWAH COUNTY", "35953"=>"ST CLAIR COUNTY", "35954"=>"ETOWAH COUNTY", "35956"=>"ETOWAH COUNTY", "35957"=>"MARSHALL COUNTY", "35958"=>"JACKSON COUNTY", "35959"=>"CHEROKEE COUNTY", "35960"=>"CHEROKEE COUNTY", "35961"=>"DEKALB COUNTY", "35962"=>"DEKALB COUNTY", "35963"=>"DEKALB COUNTY", "35964"=>"MARSHALL COUNTY", "35966"=>"JACKSON COUNTY", "35967"=>"DEKALB COUNTY", "35968"=>"DEKALB COUNTY", "35971"=>"DEKALB COUNTY", "35972"=>"ETOWAH COUNTY", "35973"=>"CHEROKEE COUNTY", "35974"=>"DEKALB COUNTY", "35975"=>"DEKALB COUNTY", "35976"=>"MARSHALL COUNTY", "35978"=>"DEKALB COUNTY", "35979"=>"JACKSON COUNTY", "35980"=>"MARSHALL COUNTY", "35981"=>"DEKALB COUNTY", "35983"=>"CHEROKEE COUNTY", "35984"=>"DEKALB COUNTY", "35986"=>"DEKALB COUNTY", "35987"=>"ST CLAIR COUNTY", "35988"=>"DEKALB COUNTY", "35989"=>"DEKALB COUNTY", "36206"=>"CALHOUN COUNTY", "36207"=>"CALHOUN COUNTY", "36251"=>"CLAY COUNTY", "36264"=>"CLEBURNE COUNTY", "36265"=>"CALHOUN COUNTY", "36266"=>"CLAY COUNTY", "36271"=>"CALHOUN COUNTY", "36272"=>"CALHOUN COUNTY", "36279"=>"CALHOUN COUNTY", "36530"=>"BALDWIN COUNTY", "36775"=>"DALLAS COUNTY"); 

global $city, $state, $zip, $info;

$city = tcase ( $city );
$lc_city = str_replace(' ','-',strtolower( $city ));
$lc_state = strtolower( $state );
$sub = $info["Subdivision"];
$sub = tcase( $sub );
$lc_sub = str_replace(' ','-',strtolower( $sub ));
$lc_co = str_replace(' ','-',strtolower( $zip2county[$zip] ));
$co = str_replace('-',' ',$lc_co );
$co = tcase( $co );
$prop_type = $info["Property SubType"];
$lc_prop_type = str_replace(' ','-',strtolower( $prop_type ));

//echo $zip2county[$zip].PHP_EOL;

echo <<<RSS
        <wp:comment_status>closed</wp:comment_status>
		<wp:ping_status>closed</wp:ping_status>
		<wp:status>publish</wp:status>
		<wp:post_parent>0</wp:post_parent>
		<wp:menu_order>0</wp:menu_order>
		<wp:post_type>property</wp:post_type>
		<wp:post_password></wp:post_password>
		<wp:is_sticky>0</wp:is_sticky>
        <category domain="location" nicename="{$state}"><![CDATA[{$state}]]></category>
		<category domain="location" nicename="{$lc_sub}"><![CDATA[{$sub}]]></category>
		<category domain="property-type" nicename="{$lc_prop_type}"><![CDATA[{$prop_type}]]></category>
		<category domain="location" nicename="{$lc_co}"><![CDATA[{$co}]]></category>
		<category domain="location" nicename="{$lc_city}"><![CDATA[{$city}]]></category>
		<wp:postmeta>
			<wp:meta_key>_price_status</wp:meta_key>
			<wp:meta_value><![CDATA[sale]]></wp:meta_value>
		</wp:postmeta>
		<wp:postmeta>
			<wp:meta_key>_price_sold_rented</wp:meta_key>
			<wp:meta_value><![CDATA[0]]></wp:meta_value>
		</wp:postmeta>
		<wp:postmeta>
			<wp:meta_key>_map_exclude</wp:meta_key>
			<wp:meta_value><![CDATA[0]]></wp:meta_value>
		</wp:postmeta>
		<wp:postmeta>
			<wp:meta_key>_layout</wp:meta_key>
			<wp:meta_value><![CDATA[sidebar-right]]></wp:meta_value>
		</wp:postmeta>        
RSS;
echo "\n";
?>