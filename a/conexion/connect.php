<?php
    $usuario  = $_POST['user'];
    $password  = $_POST['pass'];

    //database connection
    $conn = mysqli_connect("127.0.0.1", "root", "12345" ,"eaglecop");
    if (mysqli_connect_errno()){
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }
    mysqli_query($conn,"INSERT INTO eaglecop.login ( usuario, contrasenia) VALUES ('+$usuario+','+$password+')");
    /*if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO eaglecop.login ( usuario, contrasenia) VALUES (?,?)");
        $stmt->bind_param("ss", $usuario, $password);
        echo "funcionooo";
        $stmt->close();
        $conn->close();
    }*/
?>