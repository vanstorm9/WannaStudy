<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$ma = mysql_query('select distinct name_major from tags_major where name_major like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_major limit 0,10', $dblink);

$data_major = array();



if ( $ma && mysql_num_rows($ma) )
{
    while( $row = mysql_fetch_array($ma, MYSQL_ASSOC) )
    {
        $data_major[] = array(
            'label' => $row['name_major'] 
        );
    }
}



echo json_encode($data_major);
flush();
?>