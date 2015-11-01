<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$mo = mysql_query('select distinct name_movie from tags_movie where name_movie like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_movie limit 0,10', $dblink);

$data_movie = array();



if ( $mo && mysql_num_rows($mo) )
{
    while( $row = mysql_fetch_array($mo, MYSQL_ASSOC) )
    {
        $data_movie[] = array(
            'label' => $row['name_movie'] 
        );
    }
}



echo json_encode($data_movie);
flush();
?>