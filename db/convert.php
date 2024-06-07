<?php
    function fromJsonToArray(string $key = null):array{
        $json = file_get_contents(DB);
        $arrayData = json_decode($json,true);
        return $key == null?$arrayData:$arrayData[$key];
    }

    function fromArrayToJson(string $key,array $newData){
        $arrayData = fromJsonToArray();
        $arrayData[$key][] = $newData;
        $json = json_encode($arrayData);
        file_put_contents(DB,$json);
    }

    function fromArrayToJsonUpdate(string $key,string $key1, int $id, array $newData){
        $arrayData = fromJsonToArray();
        foreach($arrayData[$key] as &$item){
            if($item['id'] == $id){
                foreach($newData as $value){
                    if(!in_array($value,$item[$key1])){
                        $item[$key1][] = $value;
                    }
                }
                break;
            }
        }
        $json = json_encode($arrayData);
        file_put_contents(DB, $json);
    }
?>