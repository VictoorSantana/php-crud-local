<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php require_once 'process.php'; ?>

    <?php 
        if (isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>" >
        <?php  
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif ?>
        
    <!-- https://www.youtube.com/watch?v=3xRMUDC74Cw -->
    <!-- 26:51 -->
    <div class="py-5 d-flex flex-wrap align-items-center">
        

        <?php

        $mysqli = new mysqli('localhost', 'root', 'root123', 'mydb') or die(mysqli_error($mysqli));

        $result = $mysqli->query("SELECT * FROM TB_EXEMPLE") or die($mysqli->error);
        ?>


        <div style="width:350px" class="m-auto">
            <table class="table table-striped">

                <thead class="thead-dark">
                    <tr>
                        <th> Name </th>
                        <th> Location </th>
                        <th colspan="2"> Action </th>
                    </tr>
                </thead>

                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td> <?php echo $row['name']  ?> </td>
                        <td> <?php echo $row['location']  ?> </td>
                        <td> 
                            <a class="btn btn-info" href="index.php?edit=<?php echo $row['id'] ?>">Edit</a>
                            <a class="btn btn-danger" href="process.php?delete=<?php echo $row['id'] ?>">Dell</a> 
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>
        </div>

        <?php
        //pre_r($result->fetch_assoc());

        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }

        ?>

        <div style="width: 350px" class="m-auto p-3 border rounded">
            <h4 class="text-center my-2"> Please, fill the fields </h4>
            <form action="process.php" method="POST">
                <div class="form-group">
                    <label for="name" class="d-block m-0 text-secondary">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name" value="">
                </div>

                <div class="form-group">
                    <label for="location" class="d-block m-0 text-secondary">Location</label>
                    <input type="text" class="form-control" name="location" placeholder="Enter your location" value="">
                </div>

                <div class="form-group d-flex">
                    <button type="button" class="btn btn-link btn-block"> Cancel </button>
                    <button type="submit" name="save" class="btn btn-primary btn-block" name="save"> Save </button>
                </div>
            </form>
        </div>
    </div>



</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</html>