<?php

function request($db) {
    $table = $db->query('select * from Posts order by time_stamp desc;'); 
    return $table;
}

function requestOne($postid, $db) {
    $request = $db->prepare('select * from Posts where post_id=:id;');
    $request->bindParam(':id', $postid, PDO::PARAM_INT);
    $request->execute();
    return ($request -> fetch(PDO::FETCH_ASSOC));
}
    
function addPost($title, $content, $userName, $db) {
            
    $insert = $db->prepare('insert into Posts(title, content, username) values(:title, :content, :username);');
    $insert->bindParam(':title', $title, PDO::PARAM_STR);
    $insert->bindParam(':content', $content, PDO::PARAM_STR);
    $insert->bindParam(':username', $userName, PDO::PARAM_STR);
    $insert->execute();
}

function addComment($title, $parent, $content, $userName, $db){
            
    $insert = $db->prepare('insert into Posts(title, parent, content, username) values(:title, :parent, :content, :username);');
    $insert->bindParam(':title', $title, PDO::PARAM_STR);
    $insert->bindParam(':parent', $parent, PDO::PARAM_INT);
    $insert->bindParam(':content', $content, PDO::PARAM_STR);
    $insert->bindParam(':username', $userName, PDO::PARAM_STR);
    $insert->execute();
}

function drop($postid, $db){
        
    $drop = $db->prepare("delete from Posts where post_id=:id;");
    $drop->bindParam(':id', $postid, PDO::PARAM_INT);
    $drop->execute();
}

function ratingUp($userName, $postid, $db){
            
    $insert = $db->prepare('update Posts set rating = rating + 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
    
    $up_record = $db->prepare('insert into Post_Ratings(username, post_id, rating) values(:username, :postid, 1) on DUPLICATE KEY update rating = 1;');
    $up_record->bindParam(':username', $userName, PDO::PARAM_STR);
    $up_record->bindParam(':postid', $postid, PDO::PARAM_INT);
    $up_record->execute();
}

function ratingDown($userName, $postid, $db){
            
    $insert = $db->prepare('update Posts set rating = rating - 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
    
    $down_record = $db->prepare('insert into Post_Ratings(username, post_id, rating) values(:username, :postid, -1) on DUPLICATE KEY update rating = -1;');
    $down_record->bindParam(':username', $userName, PDO::PARAM_STR);
    $down_record->bindParam(':postid', $postid, PDO::PARAM_INT);
    $down_record->execute();
}

function flagUp($userName, $postid, $db){
            
    $insert = $db->prepare('update Posts set flags = flags + 1 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
    
    $flag_record = $db->prepare('insert into Post_Ratings(username, post_id, flagged) values(:username, :postid, 1);');
    $flag_record->bindParam(':username', $userName, PDO::PARAM_STR);
    $flag_record->bindParam(':postid', $postid, PDO::PARAM_INT);
    $flag_record->execute();
}

function removeFlags($postid, $db){
            
    $insert = $db->prepare('update Posts set flags = 0 where post_id=:id;');
    $insert->bindParam(':id', $postid, PDO::PARAM_INT);
    $insert->execute();
}

function requestRatings($userName, $postid, $db) {
    $request = $db->prepare('select * from Post_Ratings where username=:username and post_id=:id;');
    $request->bindParam(':username', $userName, PDO::PARAM_STR);
    $request->bindParam(':id', $postid, PDO::PARAM_INT);
    $request->execute();
    return ($request -> fetch(PDO::FETCH_ASSOC));
}