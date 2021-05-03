<?php
include 'includes/logincheck.php';
include 'includes/header.php';
?>
    <?php include 'navbar.php'; ?>
    <?php

    $sql = "SELECT * FROM `posts` WHERE user_id = " . $user['id'];

    $result = $conn->query($sql);

    $posts = [];

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <br><br>
                <?php if(count($posts) > 0): ?>
                    <?php foreach($posts as $post): ?>
                        <?php print_r($post); ?>
                        <hr>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $user['name']; ?></h5>
                        <p class="card-text"><?php echo $user['username']; ?></p>
                        <a href="mailto:<?php echo $user['email']; ?>" class="btn btn-primary"><?php echo $user['email']; ?></a>
                    </div>
                </div>
<hr>
                <form action="/edit.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>