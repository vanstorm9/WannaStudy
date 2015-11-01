<?php

if ( !isset($_REQUEST['term']) )
    exit;

$dblink = mysql_connect('mysql4.000webhost.com', 'a4281456_room', 'weborigami9') or die( mysql_error() );
mysql_select_db('a4281456_room');

$ti = mysql_query('select distinct name_interest from tags_interest where name_interest like "'. mysql_real_escape_string($_REQUEST['term']) .'%" ORDER BY name_interest limit 0,10', $dblink);


$data_interest = array();



if ( $ti && mysql_num_rows($ti) )
{
    while( $row = mysql_fetch_array($ti, MYSQL_ASSOC) )
    {
        $data_interest[] = array(
            'label' => $row['name_interest'] 
        );
    }
}

echo json_encode($data_interest);
flush();
?>