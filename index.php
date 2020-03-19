<?php
    /////////////////////////////////
    //
    //　DEVELOP FILE
    //
    /////////////////////////////////

    class DevSet{
        
    }

    $jsonPath = $_SERVER['DOCUMENT_ROOT'] . '/htdocs/template.json';
    $json = file_get_contents($jsonPath);
    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $jsonAry = json_decode($json,true);

    $localPath = $_SERVER["REQUEST_URI"];
    $localName = str_replace('/', '', $localPath);

    if($localName == ''){
        include __DIR__.'/htdocs/index.php';
        exit();
    }else{
        $_GET['code'] = $localName;
        if(count($jsonAry) > 0){
            foreach($jsonAry as $key => $value){
                if($key == $localName){
                    include __DIR__.'/htdocs/'.$value;
                    exit();
                }
            }
        }        
        include __DIR__.'/htdocs/page.php';
        exit();
    }
?>