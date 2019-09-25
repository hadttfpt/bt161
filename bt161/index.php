<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 9/23/2019
 * Time: 3:39 PM
 */
require_once ('database.php');
if(isset($_GET ['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = 'delete from students where id = '.$delete_id;
    execute($sql);
}

$fullname = $email = $address='';
if(isset($_POST['fullname'])){
    $fullname = $_POST['fullname'];
}

if(isset($_POST['fullname'])){
    $email = $_POST['email'];
}

if(isset($_POST['fullname'])){
    $address = $_POST['address'];
}

if($fullname !='' && $email !='' && $address !=''){
    $sql = 'insert into students(fullname,email,address) values ("'.$fullname.'","'.$email.'","'.$address.'")';
    execute($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>BT161</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 30px">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Management
        </div>
        <div class=" panel-body">
            <table class="table table-hover table-bordered">
                <tr>
                    <th>No</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th width="60px"></th>
                </tr>
                <?php
                $sql = 'select * from students';
                $result = executeResult($sql);
                $no = 1;
                foreach ($result as $row) {
                    echo '<tr>
                                <td>' . ($no++) . '</td>
                                <td>' . $row['fullname'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['address'] . '</td>
                                <td><a href="?delete_id='.$row['id'].'">
                                <button class="btn-danger">Delete</button></a></td>
                          </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Input
        </div>
        <div class=" panel-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Fullname</label>
                    <input type="text" name="fullname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <button class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>