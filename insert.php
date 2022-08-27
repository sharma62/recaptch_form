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


// send data into google sheet
?>

        <script>
        $(document).ready(function(){
            var obj =  {
                            name: '<?php $name?>',
                            email: '<?php $email?>',
                            mobile: '<?php $mobile?>',
                            massage: '<?php $massage?>',
                            address: '<?php $address?>'
                         
                        }   
            jQuery.ajax({
                        url: 'https://script.google.com/macros/s/AKfycbwh8ovCsFwMzIVCPhfsu_u_JkUQPVo4d_muIVwOVUYxSf0c51TZ_6pwogKO5UHneTJJpA/exec',
                        type: 'post',
                        data:jQuery(obj).serializeArray(),
                        success:function(res){
                            alert(res);
                        }
                    });
        });     
        </script>
    <?php

    //  send Email 

        


    } else {
        echo "Error captcha ";
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