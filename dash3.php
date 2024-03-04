<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPERMARKET</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body style="margin-top: 20px;">
<div class="modal" tabindex="-1" role="dialog" id="modalid">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" method="post">
        <table align="center">
        <div class="form-group">
            <tr>
                <td style="background-color: black; color:aliceblue"> <label>Code</label></td>
                <td><input type="number" name="code" placeholder="Enter Your Code">
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td style="background-color: black; color:aliceblue"> <label>Name</label></td>
                <td><input type="text" name="name" placeholder="Enter Your Name">
            </tr>
        </div>
        <div class="form-group">
            <tr>
                <td style="background-color: black; color:aliceblue"> <label>Rate</label></td>
                <td><input type="number" name="rate" placeholder="Enter Your Rate">
            </tr>
        </div>
        
        <div class="form-group">
            <tr>
                <td> <button type="submit" name="submit" class="btn btn-success">Add </button></td>
                <td><button type="reset" name="clear" class="btn btn-warning">Reset</button></td>
            </tr>
        </div>
        </table>
    </form>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_POST['submit'])){
$code=$_POST['code'];
$name=$_POST['name'];
$rate=$_POST['rate'];
$con=mysqli_connect('localhost','root',null,'market');
$query="insert into markettab values('$code','$name','$rate')";
$res=mysqli_query($con,$query);
if($res)
  echo "<script> location.replace ('dash2.php') </script>";
else
  echo "%%%%%%ERROR%%%%%";
}
?>
<script>
    $(document).ready(function(){
        $('#buttonid').click(function(){
            $('#modalid').draggable({
              handle: ".modal-header"
            });
        });
        });
</script>

    <div class="container">
        <h1 style="text-align: center;background-color:chartreuse">🛒 WELCOME TO SUPERMARKET 🛒</h1>
       <div class="card">
         <div class="card-header" style="background-color: brown;text-align:center">
            <button type="button" class="btn btn-primary" id="buttonid" data-toggle="modal" data-target=".modal"><a href="#" class="text-light">ADD NEW</a></button>
        </div>
         <div class="card-body" style="background-color: purple;">
          <table class="table">
                    <thead>
                    <tr class="table-primary">
                    <th>#</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Rate</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php
                    $con=mysqli_connect('localhost','root',null,'market');
                    $query="select * from markettab";
                    $res=mysqli_query($con,$query);
                    $s=1;
                    while($row=mysqli_fetch_array($res)){
                        $code=$row['code'];
                        $name=$row['name'];
                        $rate=$row['rate'];
                        ?>
                    <form action='#' method="post">
                    <tr>
                         <td><?php echo $s; ?></td>
                         <td><input type="text" size=5 name="code" value="<?php echo $code; ?>"> </td>
                         <td><input type="text" size=5 name="name" value="<?php echo $name; ?>"> </td>
                         <td><input type="text" size=5 name="rate" value="<?php echo $rate; ?>"></td>
                         <td><input type="submit" value='edit' name='edit' class="btn btn-success"></td>
                    </form>
                         <td><button type="button" class="btn btn-danger"><a href="delete.php ?del=<?php echo $code ?>" class="text-light">DELETE</a></button></td>
                    </tr>   
                    <?php $s++; }?>               
                        
                   </tbody>
          </table>
         </div>
          <div class="card-footer" style="background-color:black;color:aliceblue">
            <h5>
                <?php echo date("d/m/y").'<br>';
                date_default_timezone_set("Asia/kolkata");
                echo date("h:i:sa");?>

            </h5>
            <h5 align=right>THANK YOU VISIT AGAIN</h5>
          </div>
         
         </div>
    </div>
    <?php 
    if(isset($_POST['edit'])){
    
    $con=mysqli_connect('localhost','root',null,'market');
    $code=$_POST['code'];
    $name=$_POST['name'];

    $rate=$_POST['rate'];
    $query="update markettab set name='$name',rate='$rate' where code='$code'";
    $res=mysqli_query($con,$query);
    if($res)
      echo '<script>location.replace("dash3.php")</script>';
    else 
      echo "Wrong Code Number";
    }
    ?>
</body>
</html>