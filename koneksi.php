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

        function csrf_token_validation($post_token, $session_token){
            if(isset($post_token)){
                if($_POST['csrf_token'] != $_SESSION['csrf_token']){
                    echo '<div class="alert alert-danger" role="alert">
                            Ada masalah pada CSRF token verifikasi, pergi ke halaman sebelumnya <a href="'.$_SERVER["HTTP_REFERER"].'" class="alert-link">Sebelumnya</a>.
                            </div>'; 
                    die();
                }
            }
        }
    }
?>