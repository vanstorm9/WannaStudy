<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$sp = mysql_query('select distinct name_sport from tags_sport where name_sport like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_sport limit 0,10', $dblink);

$data_sport = array();



if ( $sp && mysql_num_rows($sp) )
{
    while( $row = mysql_fetch_array($sp, MYSQL_ASSOC) )
    {
        $data_sport[] = array(
            'label' => $row['name_sport'] 
        );
    }
}



echo json_encode($data_sport);
flush();
?>