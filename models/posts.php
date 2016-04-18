<?php

function request($db) {
    $table = $db->query('select * from Posts order by time_stamp desc;'); 
    return $table;
}
    
function addPost($title, $content, $userName, $db) {
            
    $insert = $db->prepare('insert into Posts(title, content, username) values(:title, :content, :username);');
    $insert->bindParam(':title', $title, PDO::PARAM_STR);
    $insert->bindParam(':content', $content, PDO::PARAM_STR);
    $insert->bindParam(':username', $userName, PDO::PARAM_STR);
    $insert->execute();
}

function addComment($parent, $content, $userName, $db){
            
    $insert = $db->prepare('insert into Posts(parent, content, username) values(:parent, :content, :username);');
    $insert->bindParam(':parent', $title, PDO::PARAM_INT);
    $insert->bindParam(':content', $content, PDO::PARAM_STR);
    $insert->bindParam(':username', $userName, PDO::PARAM_STR);
    $insert->execute();
}

function drop($postid, $db){
        
    $drop = $db->prepare("delete from Posts where post_id=:id;");
    $drop->bindParam(':id', $postid, PDO::PARAM_INT);
    $drop->execute();
}

function ratingUp($postid, $db){
            
    $insert = $db->prepare('update Posts set rating = rating + 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
}

function ratingDown($postid, $db){
            
    $insert = $db->prepare('update Posts set rating = rating - 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
}

function flagUp($postid, $db){
            
    $insert = $db->prepare('update Posts set flags = flags + 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
}

function removeFlags($postid, $db){
            
    $insert = $db->prepare('update Posts set flags = 0 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
}