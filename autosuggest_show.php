<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$sh = mysql_query('select distinct name_show from tags_show where name_show like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_show limit 0,10', $dblink);

$data_show = array();



if ( $sh && mysql_num_rows($sh) )
{
    while( $row = mysql_fetch_array($sh, MYSQL_ASSOC) )
    {
        $data_show[] = array(
            'label' => $row['name_show'] 
        );
    }
}



echo json_encode($data_show);
flush();
?>