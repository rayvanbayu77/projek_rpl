
<?php

session_start();

if (empty($_SESSION['login']))
	header("Location: login.php");


include "config.php";

$email = $_SESSION["email"];
  $findresult = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if($res = mysqli_fetch_array($findresult))
{
  $username = $res['username']; 
  $oldusername = $res['username'];  
  $email = $res['email'];  
}
?>

<?php
             
            if(isset($_POST['submit_edit'])){
              $username = $_POST['username'];
              $email = $_POST['email'];
              $sql = $conn->query ("SELECT * FROM users WHERE id= '$id'");
              $res = mysqli_query($conn,$sql);
              if (mysqli_num_rows($res) > 0 ){
                $row = mysqli_fetch_assoc($res);

                if($oldusername != $username){
                  if($username == $row['username'])
                    {
                     echo "<script>alert('Username sudah terdaftar')</script>";
                    }
                } 
              }
              $sql = $conn->query("UPDATE users SET username = '$username', email = '$email' WHERE id='id'") or die(mysqli_error($conn));
              if($sql) {
                echo "
                <script>alert('Data berhasil diubah');
                document.location.href= 'index.php';
                </script>";
              } else {
                echo "
                <script>alert('Data gagal diubah');
                document.location.href= 'pengaturan.php';
                </script>";
              }
            }
            ?>