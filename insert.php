<?php
    if(isset($submit)){
        $insert_sql = "INSERT INTO todo (type, description, subject, date, time) VALUES('".$type."','".$description."','".$subject."','".$date."','".$time."')";
        $insert_query = mysqli_query($conn, $insert_sql);
    }
?>