<?php
    function connection(){
        $connect = mysqli_connect('localhost', 'terminalSergeli', 'yn1BWym1nxOJ]flO', 'vagon');
        return $connect;
    }
    function getInfoOperations(){
        $connect = connection();
        $sql = "SELECT * FROM `utytable`";
        $result = mysqli_query($connect, $sql);
        if(!$result) echo 'xato';
        else 
        return $result;
    }