<?php
echo '<pre>';
include '<script src="https://code.jquery.com/jquery-3.6.1.min.js" ></script>';

$conn = mysqli_connect('localhost', 'root', '', 'test');


if (isset($_POST['submit']) && $_POST['g-recaptcha-response']) {

    $secret_key = "6LfbKqkhAAAAAM4CTdJ0rgYMbPC7nRme-HpQ_OlV";
    $response = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$response}&ip={$ip}";
    $res =  file_get_contents($url);
    $data = json_decode($res, true);

    if ($data['success']) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $massage = $_POST['massage'];
        $address = $_POST['address'];
        // send data into database 
        mysqli_query($conn, "INSERT INTO `data_table`( `name`, `email`, `mobile`, `massage`, `address`)
                                VALUES ('$name','$email','$mobile','$massage','$address')");


      

    } else {
        echo 'alert("invaild captcha ")';
     }

} else {
    ?>
    <script>
        alert("Please verify Captcha");
    </script>
<?php
}

header("Location:index.php");
?>