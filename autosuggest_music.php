<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$mu = mysql_query('select distinct name_music from tags_music where name_music like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_music limit 0,10', $dblink);

$data_music = array();



if ( $mu && mysql_num_rows($mu) )
{
    while( $row = mysql_fetch_array($mu, MYSQL_ASSOC) )
    {
        $data_music[] = array(
            'label' => $row['name_music'] 
        );
    }
}



echo json_encode($data_music);
flush();
?>