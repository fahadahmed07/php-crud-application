<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- FontAwesome -->
    <link href="./fontawesome-free-5.9.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="./fontawesome-free-5.9.0-web/css/brands.css" rel="stylesheet">
    <link href="./fontawesome-free-5.9.0-web/css/solid.css" rel="stylesheet">
    <link href="./fontawesome-free-5.9.0-web/css/regular.css" rel="stylesheet">

    <title>CRUD Appication With PHP and MySQL</title>

</head>

<body>
    <?php require_once 'process.php'; ?>

    <!-- Handling alert messages for add, delete, and update -->
    <?php
    if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-<?= $_SESSION['msg_type'] ?> alert-dismissible fade show" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif ?>

    <div class="container">
        <div class="col-12">
            <h1 class="text-center py-5">Things to do...</h1>
        </div>

        <div class="col-12 col-lg-8 col-md-8 offset-lg-2 offset-md-2 mb-4">
            <form action="process.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="<?php echo $task ?>" required name="task" placeholder="Type here...">
                    <div class="input-group-append">
                        <?php
                        if ($update == true) : ?>
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                        <?php else : ?>
                            <button class="btn btn-success" type="submit" name="add">Add</button>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>


        <!-- Check the database connection and Get the data from the database -->
        <?php
        include 'config.php';
        $result = $mysqli->query("SELECT * FROM crud_data") or die($mysqli->error);
        ?>

        <div class="col-12 col-lg-8 col-md-8 offset-lg-2 offset-md-2">
            <ul class="list-group">
                <!-- Create a while loop to print the list -->
                <?php
                while ($list = $result->fetch_assoc()) : ?>
                    <li class="list-group-item">
                        <?php echo $list['task']; ?>
                        <span class="float-right text-danger">
                            <a href="index.php?edit=<?php echo $list['id']; ?>"><i class="far fa-edit text-primary mr-2"></i></a>
                            <a href="process.php?delete=<?php echo $list['id']; ?>"><i class="far fa-trash-alt text-danger ml-2"></i></a>
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <!-- Create a funtion to get value from an array -->
        <?php
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

</body>

</html>