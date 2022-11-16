<?php

    include 'database.php';

    session_start();

    // include

    if(isset($_POST['save']))        sing();
    if(isset($_POST['login']))        logg();

    
    function sing()
    {
        global $conn;

        $first = $_POST['inpfirst'];
        $last  = $_POST['inplast'];
        $Email = $_POST['inpemail'];
        $passw = $_POST['inppass'];
        $date  = $_POST['inpdate'];

        $sql   = "INSERT INTO `users`(`email`, `password`, `first_name`, `last_name`, `date`) VALUES ('$Email','$passw','$first','$last','$date')";

        if ($conn->query($sql) === TRUE) 
        {
            header('location: log_in.php');
        }
        else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function logg()
    {
        global $conn;

        $loginemail = $_POST['logemail'];
        $loginpass  = $_POST['logpass'];

        $loginreq = "SELECT * FROM `users` WHERE email = '$loginemail' AND password = '$loginpass'";
        
        
        $res = mysqli_query($conn, $loginreq);
        $rest = mysqli_fetch_assoc($res);
        $idpr = $rest['id'];
        $_SESSION['first_namee'] = $rest['first_name'];
        $_SESSION['last_namee']  = $rest['last_name'];
        
        if(mysqli_num_rows($res)!=0){
            header('location: home.php');
        }
        else{
            $_SESSION['message'] = "L'adresse e-mail que vous avez saisie n'est pas associée à un compte";
            header('location: log_in.php');
        }

        'id'="fr";
    }
    

    


