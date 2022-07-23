<?php
session_start();
if(!(isset($_SESSION['adminname']) || isset($_SESSION['name']))){
    header('location:Adminlogin.php');
}
?>
<?php
$conn = mysqli_connect('localhost','root','','projectdatabase');

$userid = $_GET['id'];

$query = "DELETE FROM doctor WHERE id = '$userid' ";
$res = mysqli_query($conn,$query);

  if ($res) {
    ?>
<script>
    alert("Delete Successfull");
    location.replace('DoctorList.php');
</script>

<?php
  }
  else{
    ?>
<script>
    alert("Delete Un-Successfull");
</script>

<?php
  }


?>