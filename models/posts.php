<?php

function request($db) {
    $table = $db->query('select * from Posts order by time_stamp;'); 
    return $table;
}

function Drop($id, $db){
        
    $drop = $db->prepare("delete from Posts where id=:id;");
    $drop->bindParam(':id', $id, PDO::PARAM_INT);
    $drop->execute();
}
    
function Add($title, $content, $userName, $db){
            
    $insert = $db->prepare('insert into Posts(title, content, username) values(:title, :content, :username);');
    $insert->bindParam(':title', $title, PDO::PARAM_STR);
    $insert->bindParam(':content', $content, PDO::PARAM_STR);
    $insert->bindParam(':username', $userName, PDO::PARAM_STR);
    $insert->execute();
}