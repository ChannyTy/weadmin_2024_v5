<?php 

switch ($_POST['function']) {
    case 'loadtype':
        $dir = "template/";

// Open a directory, and read its contents
        echo '<option>เลือกรูปแบบ</option>';
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    // echo "filename:" . $file . "<br>";
                    // $filename = iconv('UTF-8', 'windows-874', $file);
                    if ($file != "." && $file != "..") {
                        $nametype = explode(".", $file);
                        $namefile = explode("-", $nametype[0]);
                        echo '<option value="' . $file . '">' . $namefile[0] . '</option>';
                    }
                }
                closedir($dh);
            }
        }
        break;

    case 'add':
        $directory = 'template/';
        $files = glob($directory . '*.html');

        if ($files !== false) {
            $filecount = count($files);
            $setId = $filecount + 1;
        } else {
            //echo 0;
            $setId = 1;
        }

        $randomNumber = rand(111, 999);

        $filename = $setId . "-" . $randomNumber . ".html";
        //$filename = iconv('UTF-8','windows-874',$filename);
        $HTMLToolContent = str_replace("\\\"", "\"", $_POST['datahtml']);
        $fp = fopen("template/" . $filename, "w");
        chmod("template/" . $filename, 0777);
        fwrite($fp, $HTMLToolContent);
        fclose($fp);
        break;


    case 'del':
        // print_r($_POST);
        $nameTemplate = explode("-", $_POST['datadel']);
        if ($nameTemplate[0] <= 6) {
            echo "คุณไม่สามารถลบตัวอย่างพื้นฐานได้";
        } else {
            $linkFile = "template/" . $_POST['datadel'];
            unlink($linkFile);
            echo "Done";
        }
        break;
}



