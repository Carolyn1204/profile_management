<?php


session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $profile = $_SESSION['profile'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        h1 {
            margin-top: 80px;
        }

        .main {
            width: 60%;
            margin: 0 auto;
        }
        .userList {
            display: flex;
            margin-top: 50px;
            
        }

        img {
            width: 170px;
            height: 200px;
        }

        a { 
            text-decoration: none;
            font-size: 20px;
        }

        li {
            list-style-type: none;
            text-align: center;
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="main">
        
            <center><h1><?php echo "Welcome, $username!"; ?></h1>
            <a href="profile.php">Update Profile</a></center>
            <div class=" userList">
                <?php foreach ($profile as $row): ?>
                <ul>
                    <li><img src="<?php echo $row["profile_path"]; ?>" alt=""></li>
                    <li><?php echo $row["username"]; ?></li>
                </ul>
                <?php endforeach; ?>
            </div> 
    </div>

</body>

</html>