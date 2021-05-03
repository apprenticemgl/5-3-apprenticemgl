<?php
include 'includes/logincheck.php';
include 'includes/header.php';
?>
    <?php include 'navbar.php'; ?>
    <?php
    // mysql -> select -> where -> username = $_SESSION['username'];
    // $_SESSION['username']

    $serverip = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "apprenticemn";
  
    // Create connection
    $conn = new mysqli($serverip, $dbusername, $dbpassword, $dbname);
  
    // Check connection
    if ($conn->connect_error) {
      header("Location: /register.php?error=database");
      exit();
    }
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM `users` WHERE `username` = '$username'";

    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: /?aldaa=profile");
        exit();
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <br><br>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text"><?php echo $row['username']; ?></p>
                        <a href="mailto:<?php echo $row['email']; ?>" class="btn btn-primary"><?php echo $row['email']; ?></a>
                    </div>
                </div>
<hr>
                <form action="/edit.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>