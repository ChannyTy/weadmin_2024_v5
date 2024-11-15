<?php
class HomePage {
    function callTopGraphic($masterkey){
        global $config, $db, $url;

        $language = $url->pagelang[4];
    
        $sql = "SELECT
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_id as id,
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey as masterkey,

        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_subject as subject,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_pic as pic,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_url as url,
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_target as target 
    
        FROM
        " . $config['tgp']['db'] . "
        INNER JOIN " . $config['tgpl']['db'] . " ON " . $config['tgpl']['db'] . "_cid = " . $config['tgp']['db'] . "_id
        WHERE
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_masterkey = '".$masterkey."' AND 
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_language = '".$language."' AND 
        " . $config['tgpl']['db'] . "." . $config['tgpl']['db'] . "_subject != '' AND 
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_status != 'Disable' AND
        ((" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00')   OR
        (" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate='0000-00-00 00:00:00' AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW()) ) OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate='0000-00-00 00:00:00' )  OR
        (TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_sdate)<=TO_DAYS(NOW()) AND
        TO_DAYS(" . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_edate)>=TO_DAYS(NOW())  ))
        ";
    
        $sql .= " ORDER  BY " . $config['tgp']['db'] . "." . $config['tgp']['db'] . "_order DESC ";
        // print_pre($sql);
        $result = $db->execute($sql);
        return $result;
    }
}
