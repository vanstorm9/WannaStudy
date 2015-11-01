<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$vg = mysql_query('select distinct name_game from tags_game where name_game like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_game limit 0,10', $dblink);

$data_game = array();



if ( $vg && mysql_num_rows($vg) )
{
    while( $row = mysql_fetch_array($vg, MYSQL_ASSOC) )
    {
        $data_game[] = array(
            'label' => $row['name_game'] 
        );
    }
}



echo json_encode($data_game);
flush();
?>