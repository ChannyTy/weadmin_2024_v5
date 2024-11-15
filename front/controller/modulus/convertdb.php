<?php

switch ($type) {
    case 'MyISAM':
        $setFrom = 'INNODB';
        $setTo = 'MyISAM';
        $gennerate = true;
        break;

    case 'INNODB':
        $setFrom = 'MyISAM';
        $setTo = 'INNODB';
        $gennerate = true;
        break;
}


if (!empty($gennerate)) {
    $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = '$core_db_name' 
        AND ENGINE = '$setFrom'";

    $rs = mysql_query($sql);
    
    echo "##################";
    echo $setFrom . " > " . $setTo . "<br>";
    echo "##################";
    
    while ($row = mysql_fetch_array($rs)) {
        $tbl = $row[0];
        $sql = "ALTER TABLE `$tbl` ENGINE=$setTo";
        $status = mysql_query($sql);
        if (!empty($status)) {
            echo $tbl . " : [SUCCESS]<br>";
        } else {
            echo $tbl . " : [FAIL]<br>";
        }
    }

    echo "## SUCCESS ##";
}