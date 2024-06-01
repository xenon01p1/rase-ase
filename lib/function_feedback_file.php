<?php

function search_feedback_file_by_feedback_id($db, $feedback_id){
    $feedback=[];
    $sql = "SELECT * FROM feedback_file WHERE feedback_id=:v_feedback_id ORDER BY feedback_id DESC"; 
    $query = $db->prepare($sql);
    $query->bindParam(":v_feedback_id", $feedback_id);
    $query->execute();
    $result = $query->fetchAll();
    foreach ($result as $row) 
    {  $feedback[] = $row;  }
    return $feedback; 
}