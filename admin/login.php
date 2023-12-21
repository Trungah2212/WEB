<?php
session_start();
include('config/config.php');
if (isset($_POST["dangnhap"])) {
    $taikhoan = $_POST['username'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT *FROM tbl_admin WHERE name_admin ='" . $taikhoan . "'AND password='" . $matkhau . "' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $_SESSION['dangnhap'] = $taikhoan;
        header("Location:index.php");
        exit();
    } else {
        echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác"); setTimeout(function(){ window.location.href = "login.php"; }, 150);</script>';
    }
}
?>

<!-- Giao Diện login Admin-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../admin/css/login_admin.css"> -->
    <title>Login | Admin</title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" autocomplete="off" method="POST">
                    <h2>Login Admin</h2>
                    <div class="inputbox">
                        <input type="text" class="input" name="username">
                        <i class="bx bx-user"></i>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" class="input" name="password">
                        <i class="bx bx-lock-alt"></i>
                        <label for="">Password</label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="submit" name="dangnhap" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </section>

</html>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'poppins', sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        width: 100%;
        background: url('../admin/img/c.jpg')no-repeat;
        background-position: center;
        background-size: cover;
    }

    .form-box {
        position: relative;
        width: 400px;
        height: 450px;
        background: transparent;
        border: 2px solid rgba(239, 233, 233, 0.984);
        border-radius: 20px;
        backdrop-filter: blur(15px);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h2 {
        font-size: 2em;
        color: #fff;
        text-align: center;
    }

    .inputbox {
        position: relative;
        margin: 30px 0;
        width: 310px;
        border-bottom: 2px solid #fff;
    }

    .inputbox label {
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        color: #fff;
        font-size: 1em;
        pointer-events: none;
        transition: .5s;
    }

    input:focus~label,
    input:valid~label {
        top: -5px;
    }

    /* input:focus ~ label: Khi trường input được tập trung vào (được focus), 
quy tắc này sẽ áp dụng cho phần tử label ngay sau trường input được focus. 
Hiệu ứng là thay đổi vị trí của label lên trên (top: -5px), có thể để tạo 
hiệu ứng label nổi bật khi người dùng tương tác với trường input.
input:valid ~ label: Khi giá trị của trường input là hợp lệ, quy tắc này sẽ 
áp dụng cho phần tử label ngay sau trường input. Cũng giống như trường hợp 
focus, hiệu ứng là thay đổi vị trí của label lên trên (top: -5px), có thể 
để tạo hiệu ứng khi trường input chứa dữ liệu hợp lệ. */

    .inputbox input {
        width: 100%;
        height: 50px;
        background: transparent;
        border: none;
        outline: none;
        font-size: 1em;
        padding: 0 35px 0 5px;
        color: #fff;
    }

    .input-field input {
        width: 100%;
        height: 40px;
        border-radius: 40px;
        background: #fff;
        border: none;
        outline: none;
        cursor: pointer;
        font-size: 1em;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .input-field input:hover {
        background-color: #a639c1;
        color: #fff;
    }
</style>