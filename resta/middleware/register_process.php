<?php

session_start();

require_once "../../config/connection.php";
require_once "../../lib/function_customer.php";
require_once "../../lib/function_miscellaneous.php";
require_once '../assets/vendor_lib/phpmailer/src/PHPMailer.php';
require_once '../assets/vendor_lib/phpmailer/src/SMTP.php';
require_once '../assets/vendor_lib/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if($_GET['action'] == 'register' && isset($_POST['customer_email'])){

    $customer_email         = $_POST['customer_email'];
    $customer_username      = $_POST['customer_username'];
    $customer_salt          = guidv4();
    $customer_password      = password_hash($_POST['customer_password'].$customer_salt, PASSWORD_DEFAULT);
    $customer_otp_code      = rand(1000,9999);
    $customer_verified      = 0;
    $customer_status        = 0;
    $customer_input_datetime= date('Y-m-d H:i:s');
    $is_email_exist         = search_customer_by_customer_email($db, $customer_email);

    // CHECKING THINGS
    if($is_email_exist){
        echo "<script>
            alert('Email telah terdaftar. Silahkan daftar menggunakan email lain.');
            document.location.href = '../register.php';
        </script>";
        exit;
    }


    // INSERT DATA
    $query_invoice   = $db->prepare("INSERT INTO customer (customer_email, customer_username, customer_password, customer_salt, customer_otp_code, customer_verified, customer_status,  customer_input_datetime) VALUES ( :v_customer_email, :v_customer_username, :v_customer_password, :v_customer_salt, :v_customer_otp_code, :v_customer_verified, :v_customer_status, :v_customer_input_datetime)");  
    $query_invoice->bindParam(":v_customer_email",$customer_email);
    $query_invoice->bindParam(":v_customer_username",$customer_username);
    $query_invoice->bindParam(":v_customer_password",$customer_password); 
    $query_invoice->bindParam(":v_customer_salt",$customer_salt);
    $query_invoice->bindParam(":v_customer_otp_code",$customer_otp_code);
    $query_invoice->bindParam(":v_customer_verified",$customer_verified);
    $query_invoice->bindParam(":v_customer_status",$customer_status);
    $query_invoice->bindParam(":v_customer_input_datetime",$customer_input_datetime);
    $query_invoice->execute();
    $invoice_id = $db->lastInsertId();
    $count = $query_invoice->rowCount();
    if ($count==0) {
        echo "<script>
            alert('Terjadi kesalahan yang tidak terduga, silahkan coba lagi');
            document.location.href = '../register.php';
        </script>";
        exit;
    }


    // SEND EMAIL
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
        $mail->Username   = 'sofietiara404@gmail.com';              // SMTP username
        $mail->Password   = 'cznt dqpq fasq jlbn';                       // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also available
        $mail->Port       = 587;                                   // TCP port to connect to

        // Recipients
        $mail->setFrom('sofietiara404@gmail.com', 'App Tester');
        $mail->addAddress($customer_email, 'You');     // Add a recipient

        // Content
        $mail->isHTML(true);                                       // Set email format to HTML
        $mail->Subject = 'OTP Code';
        $mail->Body    = 'Your OTP Code is <b>'.$customer_otp_code.'</b>';
        $mail->AltBody = 'Your OTP Code is <b>'.$customer_otp_code.'</b>';

        // Send email
        $mail->send();

        $_SESSION['customer_email']    = $customer_email;
        $_SESSION['customer_username'] = $customer_username;

        header('location:../view/otp_verify.php?customer_email='.$customer_email);
        exit;

    } catch (Exception $e) {
        echo "<script>
            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
            document.location.href = '../../register.php';
        </script>";
        exit;
    }

}elseif($_GET['action'] == 'verify'){

    $customer_email     = $_POST['customer_email'];
    $letter1            = $_POST['letter1'];
    $letter2            = $_POST['letter2'];
    $letter3            = $_POST['letter3'];
    $letter4            = $_POST['letter4'];
    $input_code         = join('',[$letter1, $letter2, $letter3, $letter4]);
    $customer           = search_customer_by_customer_email($db, $customer_email)[0];
    $customer_id        = $customer['customer_id'];
    $customer_verified  = 1;

    if($input_code == $customer['customer_otp_code']){

        $query_customer = $db->prepare("UPDATE customer 
            SET 
            customer_verified = :v_customer_verified
            WHERE 
            customer_id = :v_customer_id"
        );

        $query_customer->bindParam(":v_customer_verified", $customer_verified);
        $query_customer->bindParam(":v_customer_id", $customer_id);

        $query_customer->execute();
        $count = $query_customer->rowCount();

        if ($count == 0) {
            echo "<script>
                    alert('terjadi kesalahan yang tidak terduga, silahkan coba lagi');
                    document.location.href = '../view/otp_verify.php?customer_email=".$customer_email."';
                </script>";
            exit;
        }

        header('location:../view/register_location.php?customer_email='.$customer_email);
        exit;

    }else{
        echo "<script>
            alert('OTP Code invalid.');
            document.location.href = '../view/otp_verify.php?customer_email=".$customer_email."';
        </script>";
        exit;
    }

}elseif($_GET['action'] == 'register_location'){

    $customer_email = $_POST['customer_email'];
    $province_id    = $_POST['province_id'];
    $regency_id     = $_POST['regency_id']; 
    $district_id    = $_POST['district_id'];
    $village_id     = $_POST['village_id'];
    $customer       = search_customer_by_customer_email($db, $customer_email)[0];
    $customer_id    = $customer['customer_id'];

    $query_customer = $db->prepare("UPDATE customer 
        SET 
            province_id = :v_province_id,
            regency_id = :v_regency_id,
            district_id = :v_district_id,
            village_id = :v_village_id
        WHERE 
            customer_id = :v_customer_id"
    );

    $query_customer->bindParam(":v_province_id", $province_id);
    $query_customer->bindParam(":v_regency_id", $regency_id);
    $query_customer->bindParam(":v_district_id", $district_id);
    $query_customer->bindParam(":v_village_id", $village_id);
    $query_customer->bindParam(":v_customer_id", $customer_id);
    $query_customer->execute();
    $count = $query_customer->rowCount();

    if ($count == 0) {
        echo "<script>
                alert('terjadi kesalahan yang tidak terduga, silahkan coba lagi');
                document.location.href = '../view/register_location.php?customer_email=".$customer_email."';
            </script>";
        exit;
    }

    header('location:../view/branch_location.php'); // <- change
    exit;


}else{
    header('location:../../login_customer.php');
    exit;
}