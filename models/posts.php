<?php

function request($db) {
    $table = $db->query('select * from Posts order by time_stamp;'); 
    return $table;
}

function Drop($id, $db){
        
    $drop = $db->prepare("delete from hw4students where id=:id;");
    $drop->bindParam(':id', $id, PDO::PARAM_INT);
    $drop->execute();
}
    
function Add($firstin, $lastin, $genderin, $gradin, $db){
            
    $insert = $db->prepare('insert into hw4students(first, last, gender, grad) values(:firstin, :lastin, :genderin, :gradin)');
    $insert->bindParam(':firstin', $firstin, PDO::PARAM_STR);
    $insert->bindParam(':lastin', $lastin, PDO::PARAM_STR);
    $insert->bindParam(':genderin', $genderin, PDO::PARAM_STR);
    $insert->bindParam(':gradin', $gradin, PDO::PARAM_INT); //the year works for normal years
    $insert->execute();
}