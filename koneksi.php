<?php
    Class DbConnection{
        function getDbConnection(){
            $conn = mysqli_connect("localhost", "root", "", "learn_pl2") or die("Couldn't connect");
            return $conn;
        }

        function available_mahasiswa($nim){
            $query = mysqli_query($this->getDbConnection(), "select * from mahasiswa where nim='".$nim."'");
            $result = mysqli_fetch_array($query);
            return $result;
        }
    }
?>