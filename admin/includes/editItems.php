<?php
    function editItem($id){
        if(!checkitemvalid($id)){return false;}

        $col = "title";
        if(checkcol($id,$col)){
            updatecol($id,$col);
        }
    }

    

    function checkitemvalid($id){
        global $database;
        $sql = "SELECT item_id FROM item WHERE item_id=$id";
        $item = $database->query($sql);
        if(mysqli_error($database)){
            echo '<script>alert("The Requested Operation was unsuccessful. SQL returned an error(No:'.mysql_errno($database).').);</script>';
            return false;
        }
        if($item){

            if($item->num_rows === 0){
                echo '<script>alert("The Requested Operation was unsuccessful. The Item ID is Invalid");</script>';
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function checkcol($id,$col){
        global $database;
        $sql = "SELECT $col FROM item WHERE item_id=$id";
        $item = $database->query($sql);
        
        if(mysqli_error($database)){
            echo '<script>alert("The Requested Operation was unsuccessful. SQL returned an error(No:'.mysql_errno($database).').);</script>';
            return false;
        }
        
        if($item){
            
            if($item->num_rows === 0){
                echo '<script>alert("The Requested Operation was unsuccessful. The Item colum('.$col.') is Invalid");</script>';
                return false;
            }
        }

        if($data = $item->fetch_object())
        {
            if($data->$col == $_SESSION['data'][$col])
            {
                return false;
            }
            else
            {
                return true;
            }
        }
        else{
            echo '<script>alert("The Requested Operation was unsuccessful. The Item colum('.$col.') is Invalid");</script>';
            return false;
        }
    }

    function updatecol($id,$col){
        global $database;
        $new = $_SESSION['data'][$col];
        $sql = "UPDATE item SET $col='$new' WHERE item_id='$id'";

        $database->query($sql);
        
        if(mysql_error($database)){
            echo '<script>alert("The Requested Operation was unsuccessful. SQL returned an error(No:'.mysql_errno($database).').);</script>';
            return false;
        }
        return true;
    }
?>