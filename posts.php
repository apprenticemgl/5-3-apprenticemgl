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
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post['post_title']; ?></h5>
                                <p class="card-text"><?php echo $post['post_content']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

<hr>
                <form action="/createpost.php" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="post_title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Content</label>
                        <textarea name="post_content" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>