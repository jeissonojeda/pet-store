<?php
include('config/database.php');

$email =$_POST['e_mail'];
$passw =$_POST['p_assw'];

//$hashed_password =password_hash($passw,PASSWORD_DEFAULT);
$hashed_password =$passw;
$sql ="
select 
id,
count(u.id) as total
from
users u
where 
email = '$email' and 
password ='$hashed_password'
group by
id
";
$res =pg_query($conn, $sql);
if($res){
    $row=pg_fetch_assoc($res);
    if($row['total']>0){
        header('refresh:0; URL:http://localhost/pet-store/src/home.php');
    }else{
        echo"login failed !!!";  
    }
}





?>