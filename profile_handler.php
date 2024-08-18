<?php
$allowed_extensions = array('jpeg', 'jpg', 'png');
$max_file_size = 5242880;


if (isset($_POST)) {

    $uname = htmlspecialchars($_POST["uname"]);


    if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0) {

        $file = $_FILES["pic"];
        $filename = $_FILES["pic"]["name"];
        $tempname = $_FILES["pic"]["tmp_name"];
        $filesize = $_FILES["pic"]["size"];


        $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            echo "Error: Only JPEG, JPG, PNG files are allowed.";
            exit();
        }

        if ($filesize > $max_file_size) {
            echo "Error: File size exceeds the maximum limit (5 MB).";
            exit();
        }

        $newFileName = uniqid('', true) . '.' . $file_extension;
        $destination = "uploads/" . $newFileName;
        move_uploaded_file($tempname, $destination);

        session_start();
        $_SESSION['username'] = $uname;
        $new_profile = ['username' => $uname, 'profile_path' => $destination];
        if (!isset($_SESSION['profile'])) {
            $GLOBALS['user_profiles'] = array();
            array_push($GLOBALS['user_profiles'], $new_profile);
            $_SESSION['profile'] = $GLOBALS['user_profiles'];

        } else {
            $GLOBALS['user_profiles'] = array();
            $GLOBALS['user_profiles'] = $_SESSION['profile'];
            array_push($GLOBALS['user_profiles'], $new_profile);
            $_SESSION['profile'] = $GLOBALS['user_profiles'];

        }
        $lastVisitTime = time();
        setcookie('last_visit', $lastVisitTime, time() + (86400 * 30), "/");

        echo ("<script type='text/javascript'>alert(`Profile updated successfully!`);</script>");
        echo ("<script> window.location = 'index.php';</script>");

    }



}
?>