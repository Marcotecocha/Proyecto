<?php
//--------------------Registro de usuarios-----------------------------
if(isset($_POST['nd']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);

$usuario = $_POST['usuario'];
$contra = $_POST['contra'];
$mail = $_POST['mail'];
    
    $insert = "INSERT into Usuarios(usuario, contra, mail) 
                            VALUES('$usuario','$contra','$mail')";
    
    $ejecutado = mysqli_query($connect,$insert);

mysqli_close($connect);
if ($ejecutado == 1)
{
    echo "registro correcto";
}
}

//-----------------Consulta por id----------------------
if(isset($_POST['btn']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);

    $id = $_POST['ID'];

    $resultados= mysqli_query($connect,"SELECT * FROM Usuarios WHERE ID = $id");
    while($consulta = mysqli_fetch_array($resultados))
    {
        echo $consulta['ID']."<br>";
        echo $consulta['usuario']."<br>";
        echo $consulta['contra']."<br>";
        echo $consulta['mail']."<br>";
    }
//cerrar la conexiè´—n
mysqli_close($connect);
}
//---------------------Registro de temp--------------------------
if(isset($_POST['temp'])){
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);

$sensor = $_POST['sensor'];
$valor = $_POST['valor'];

 $inserttemp = "INSERT into Temperatura(sensor, valor) 
                            VALUES('$sensor','$valor')";
$ejecutado1 = mysqli_query($connect,$inserttemp);


//cerrar la conexiè´—n
mysqli_close($connect);
if ($ejecutado1 == 1)
{
    echo "registro correcto";
}
}
//-----------------Consultas Aritmeticas---------------------
//------------Maximo Valor---------------------
if(isset($_POST['Vmayor']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);


    $Valormax= mysqli_query($connect,"SELECT MAX(valor) AS valores FROM Temperatura");
    while($data = mysqli_fetch_array($Valormax))
    {
        echo "Temperatura mayor registrada: ".$data['valores'];
    }
//cerrar la conexiè´—n
mysqli_close($connect);
}
//-----------Minimo Valor--------------
if(isset($_POST['Vmenor']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);


    $Valormin= mysqli_query($connect,"SELECT MIN(valor) AS valores FROM Temperatura");
    while($data = mysqli_fetch_array($Valormin))
    {
        echo "Temperatura menor registrada: ".$data['valores'];
    }
//cerrar la conexiè´—n
mysqli_close($connect);
}
//------------Temp promedio----------
if(isset($_POST['prom']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);


    $prom= mysqli_query($connect,"SELECT AVG(valor) AS valores FROM Temperatura");
    while($data = mysqli_fetch_array($prom))
    {
        echo "Temperatura promedio: ".$data['valores'];
    }
//cerrar la conexiè´—n
mysqli_close($connect);
}
//------------Maximo Valor por sensor---------------------
if(isset($_POST['Vmax']))
{
$servername = "localhost";
$username= "hallcnxi_Ernesto";
$pass= "i4eyR4Ifs";
$dbname="hallcnxi_Proyecto_MTR";

$connect= mysqli_connect($servername,$username,$pass,$dbname);
    
    $nsensor = $_POST['nombresensor'];
    
    $Valormax= mysqli_query($connect,"SELECT MAX(valor) AS valores FROM Temperatura WHERE sensor = $nsensor");
    while($data = mysqli_fetch_array($Valormax))
    {
        echo "Temperatura mayor registrada: ".$data['valores']."<br>";
        echo "en el sensor: ".$nsensor."<br>";
        echo $data['id']."<br>";
        echo $data['sensor']."<br>";
        echo $data['valor']."<br>";
    }
//cerrar la conexiè´—n
mysqli_close($connect);
}
// Consultar tama√±o de los datos insertados en la tabla
?>