<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$cou = mysql_query('select distinct name_country from tags_country where name_country like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_country limit 0,10', $dblink);

$data_country = array();



if ( $cou && mysql_num_rows($cou) )
{
    while( $row = mysql_fetch_array($cou, MYSQL_ASSOC) )
    {
        $data_country[] = array(
            'label' => $row['name_country'] 
        );
    }
}



echo json_encode($data_country);
flush();
?>