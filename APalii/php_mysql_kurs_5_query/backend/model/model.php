<?php
# Задание 1 
class Model {

    public function getTableq1() {
        $col1 = "serv_name";
        $query = "select serv_name as ". $col1 ." from services"; 
        $result =  ["header" => [["name" => $col1, "type" => "text"]], "data" => DatabaseHandler::GetAll($query)]; 
        //var_dump($result);
        return json_encode($result);        
    }    

    public function getTableq2() {
        $col1 = "tariff_name";
        $col2 = "serv_name";
        $col3 = "price";
        $query = "select tariffs.tariff_name as ".$col1.", services.serv_name as ".$col2.", services.price as ".$col3." from tariffs 
                    left join tariffs_has_services on (tariffs.tariff_id=tariffs_has_services.tariffs_tariff_id) 
                    left join services on (tariffs_has_services.services_serv_id=services.serv_id)"; 
        $result =  ["header" => [["name" => $col1, "type" => "text"], ["name" => $col2, "type" => "text"], ["name" => $col3, "type" => "text"]], "data" => DatabaseHandler::GetAll($query)]; 
        //var_dump($result);
        return json_encode($result);        
    } 

    public function getTableq3() {
        $query = "select * from tariffs"; 
        $result =  DatabaseHandler::GetAll($query); 
        //var_dump($result);
        return $result;        
    } 

    public function getTableq3_1($tariff_id) {
        $col1 = "subscriber_name";
        $query = "select subscriber_name as ". $col1 ." from subscribers where tariff_id = ". $tariff_id; 
        $result =  ["header" => [["name" => $col1, "type" => "text"]], "data" => DatabaseHandler::GetAll($query)]; 
        //var_dump($result);
        return json_encode($result);          
    } 

    public function getTableq4() {
        $col1 = "tariff_name";
        $col2 = "amount";
        $query = "select tariffs.tariff_name as ".$col1.", count(*) as ".$col2." from subscribers 
                    left join tariffs on (subscribers.tariff_id = tariffs.tariff_id)
                    group by subscribers.tariff_id order by amount desc"; 
        $result =  ["header" => [["name" => $col1, "type" => "text"], ["name" => $col2, "type" => "text"]], "data" => DatabaseHandler::GetAll($query)]; 
        //var_dump($result);
        return json_encode($result);        
    }   
    public function getTableq5() {
        $col1 = "name";
        $col2 = "hvalue";
        $query = "select tariffs.tariff_name as ".$col1.", count(*) / temp.total * 100 as ".$col2." from subscribers 
                    left join tariffs on (subscribers.tariff_id = tariffs.tariff_id)
                    left join (select count(*) as total from subscribers) as temp on true
                    group by subscribers.tariff_id " ;
        $result =  DatabaseHandler::GetAll($query); 
        //var_dump($result);
        return json_encode($result);        
    }   
   
}