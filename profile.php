
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    h1 {
        margin-top: 80px;
    }

    h4 {
        font-style: italic;
    }

    form {
        margin-top: 50px;
    }

    label {
        font-weight: 600;
        font-size: 20px;
    }

    button {
        margin-top: 30px;
    }
</style>
<body>
    <div class="container col-md-4">
            <h1>User profile</h1>
            <h4>
                <?php  
                    if (isset($_COOKIE['last_visit'])) {
                        $lastVisitTime = $_COOKIE['last_visit'];
                        echo "Your last visit was on: " . date("Y-m-d H:i:s", $lastVisitTime);
                    } 
                ?>
            </h4>
            <form action="profile_handler.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="uname" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="uname" name="uname">
                </div>
                <div class="mb-3">
                    <label for="pic" class="form-label">Profile Picture:</label>
                    <input type="file" class="form-control" id="pic" name="pic">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>

</body>
</html>
