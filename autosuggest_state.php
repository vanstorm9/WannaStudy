<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$sta = mysql_query('select distinct name_state from tags_state where name_state like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_state limit 0,10', $dblink);

$data_state = array();



if ( $sta && mysql_num_rows($sta) )
{
    while( $row = mysql_fetch_array($sta, MYSQL_ASSOC) )
    {
        $data_state[] = array(
            'label' => $row['name_state'] 
        );
    }
}



echo json_encode($data_state);
flush();
?>