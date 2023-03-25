<?php
require_once 'Class/database/database.php';
require_once 'Class/database/do_select/do_select.php';
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $do_class = new \do_select\do_select\do_select('h.ho', 'root', '');
    $sql="INSERT INTO `users` SET name=?,lastname=?,email=?,password=?";
    $do_class->do($sql,[$name,$lastname,$email,$password]);
}
?>
<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap-rtl.css">
    <link rel="stylesheet" href="css/style.css">
    <title>sign in</title>
</head>
<body>
<div class="container-fluid m30top">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Sign In
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="lastname" name="lastname">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <button type="submit" name="btn" class="btn btn-block btn-success">Wellcome</button>
                    </form>
                </div>
                <div class="panel-footer">
                    <center>
                        h.ho
                    </center>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of people
                </div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Registration Time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql1="SELECT * FROM `users`";
                        $select = new do_select\do_select\do_select('h.ho','root','');
                        $res = $select->select($sql1);
                        foreach ($res as $val) {
                        ?>
                        <tr>
                            <td><?php echo $val['id']?></td>
                            <td><?php echo $val['name']?></td>
                            <td><?php echo $val['lastname']?></td>
                            <td><?php echo $val['email']?></td>
                            <td><?php echo $val['time']?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <center>
                        h.ho
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
</body>
</html>