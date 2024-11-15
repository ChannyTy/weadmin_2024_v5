<?php
$config['setting']['db'] = "md_sit";
$config['settingl']['db'] = "md_sitl";
$config['setting']['masterkey'] = "set";

$config['tgp']['db'] = "md_tgp";
$config['tgpl']['db'] = "md_tgpl";
$config['tgp']['masterkey'] = "tg";

$config['cmf']['db']['main'] = "md_cmf";

$mainPage = new mainPage();

class mainPage
{
    public $infoSetting;

    function __construct()
    {
        $this->infoSetting = self::callSetting();
    }
    function callSetting()
    {
        global $config, $db, $url;

        $language = $url->pagelang[4];

        $sql = "SELECT
      " . $config['setting']['db'] . "." . $config['setting']['db'] . "_id as id,
      " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey as masterkey,

      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_subject as subject,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_subjectoffice as subjectoffice,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_description as description,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_keywords as keywords,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_metatitle as metatitle,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_social as social,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_config as config,
      " . $config['settingl']['db'] . "." . $config['settingl']['db'] . "_addresspic  as addresspic 

      FROM
      " . $config['setting']['db'] . "
      INNER JOIN
      " . $config['settingl']['db'] . " ON " . $config['settingl']['db'] . "_containid = " . $config['setting']['db'] . "_id
      WHERE
      " . $config['setting']['db'] . "." . $config['setting']['db'] . "_masterkey = '" . $config['setting']['masterkey'] . "' 
      AND " . $config['setting']['db'] . "." . $config['setting']['db'] . "_language = '" . $language . "' 
      ";
        $result = $db->execute($sql);
        return $result;
    }

    function Call_Album($id, $table)
    {
        global $db;

        $sql = "SELECT 
          " . $table . "." . $table . "_id                AS id,
          " . $table . "." . $table . "_contantid         AS contantid,
          " . $table . "." . $table . "_filename          AS filename,
          " . $table . "." . $table . "_name              AS name,
          " . $table . "." . $table . "_download          AS download
          FROM " . $table . "  
          WHERE 1=1 AND
          " . $table . "." . $table . "_contantid = '" . $id . "'
          ";

        $sql .= " ORDER BY " . $table . "." . $table . "_seq ASC ";
        $result = $db->execute($sql);
        return $result;
    }

    function Call_File($id, $keyfile = null)
    {
        global $config, $db;

        $sql = "SELECT 
          " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id                AS id,
          " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid         AS contantid,
          " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_filename          AS filename,
          " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_name              AS name,
          " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_download          AS download
          FROM " . $config['cmf']['db']['main'] . "  
          WHERE 1=1 
          AND " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_contantid = '" . $id . "'
          ";

        if (!empty($keyfile)) {
            $sql .= "
      AND " . $config['product']['category'] . "." . $config['product']['category'] . "_id = '" . $id . "'
      ";
        }

        $sql .= " ORDER BY " . $config['cmf']['db']['main'] . "." . $config['cmf']['db']['main'] . "_id ASC ";
        $result = $db->execute($sql);
        return $result;
    }

    function updateView($id, $masterkey, $table)
    {
        global $db;

        $sql = "SELECT
      " . $table . "." . $table . "_view
      FROM
      " . $table . "
      WHERE
      " . $table . "." . $table . "_masterkey = '$masterkey' 
      AND
      " . $table . "." . $table . "_id = '$id' 
      ";
        $result = $db->execute($sql);
        $view = $result->fields[0] + 1;

        $listView[$table . '_view'] = $view;
        $updateView = sqlupdate($listView, $table, $table . "_id", "'" . $id . "'");

        return $updateView;
    }
}
