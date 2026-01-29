<?php
session_start();
include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Arial, sans-serif;
    }

    body {
      margin: 0;
      height: 100vh;
      background: linear-gradient(135deg, #5f5bff, #8a6cff, #ff7aa2);
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* Main Card */
    .login-container {
      width: 920px;
      height: 520px;
      background: #fff;
      border-radius: 30px;
      overflow: hidden;
      display: flex;
      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.25);
    }

    /* LEFT PANEL */
    .left-panel {
      flex: 1.1;
      background: linear-gradient(135deg, #6a5cff, #ff7aa2);
      color: #fff;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      padding-top: 60px;
      position: relative;
    }

    .left-panel h1 {
      font-size: 42px;
      font-weight: 700;
      margin-bottom: 25px;
      white-space: nowrap;/* ป้องกันการตัดคำ */
      margin-bottom: 10px;   /* ⭐ ระยะห่างจาก p (เดิมอาจเยอะ) */
    }

    .left-panel p {
      font-size: 17px;
      line-height: 1.7;
      opacity: 0.95;
      margin-top: 0;/* ⭐ ไม่ให้มีช่องว่างบน */
      line-height: 1.6;/* ระยะห่างบรรทัด อ่านง่าย */
      max-width: 90%;/* กันข้อความกว้างเกิน */

    }

    /* Decorative shapes */
    .left-panel::after {
      content: "";
      position: absolute;
      bottom: -40px;
      left: -40px;
      width: 250px;
      height: 250px;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 50%;
    }

    /* RIGHT PANEL */
    .right-panel {
      flex: 1;
      padding: 60px 55px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .right-panel h2 {
      margin-bottom: 35px;
      font-size: 30px;
      font-weight: 700;
      color: #6a5cff;
      text-align: center;
      /* ให้ USER LOGIN อยู่กลาง */
      letter-spacing: 1px;
    }

    /* INPUT WITH ICON */
    .form-group {
      margin-bottom: 18px;
    }

    .input-icon {
      position: relative;
    }

    .input-icon i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #9aa0c6;
      font-size: 15px;
    }

    .input-icon input {
      width: 100%;
      padding: 14px 20px 14px 45px;
      border-radius: 50px;
      background: #eef2ff;
      border: none;
      font-size: 14px;
    }

    .input-icon input:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(106, 92, 255, 0.25);
    }

    /* SHOW PASSWORD INSIDE */
    .show-password {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 12px;
      cursor: pointer;
      color: #6a5cff;
    }

    /* OPTIONS */
    .options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      /* แก้ไม่ให้เอียง */
      font-size: 13px;
      margin: 10px 5px 28px;
      color: #666;
    }

    .options label {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .options a {
      text-decoration: none;
      color: #999;
    }

    .options a:hover {
      text-decoration: underline;
    }

    /* LOGIN BUTTON */
    .login-btn {
      width: 100%;
      padding: 14px;
      border: none;
      border-radius: 50px;
      background: linear-gradient(135deg, #6a5cff, #ff7aa2);
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 10px 25px rgba(106, 92, 255, 0.35);
    }

    .login-btn:hover {
      opacity: 0.95;
      transform: translateY(-2px);
    }

    @media (max-width: 900px) {
      .login-container {
        flex-direction: column;
        width: 95%;
        height: auto;
      }
    }
  </style>

</head>

<body>

  <div class="login-container">

    <!-- LEFT -->
    <div class="left-panel">
      <h1>Test website</h1>
      <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit, alias ipsum, dolore minus laboriosam maiores id
        harum amet illo placeat sit, expedita ducimus asperiores omnis. Nulla necessitatibus ipsa voluptatibus
        dolorem.<br>

      </p>
    </div>

    <!-- RIGHT -->
    <div class="right-panel">
      <h2>USER LOGIN</h2>

      <form name="frmpage" action="loginpage.php" method="POST">

        <div class="form-group input-icon">
          <i class="fa-solid fa-user"></i>
          <input type="email" name="email_mem" placeholder="Username" required>
        </div>


        <div class="form-group input-icon">
          <i class="fa-solid fa-lock"></i>
          <input type="password" name="password_mem" id="password_mem" placeholder="Password" required>
          <div class="show-password" onclick="togglePassword()">แสดง</div>
        </div>
        <div class="options">
          <label class="remember">
            <input type="checkbox">
            <span>Remember</span>
          </label>
          <a href="#" class="forgot">Forgot password?</a>
        </div>


        <input type="submit" name="submit" value="LOGIN" class="login-btn">

      </form>
    </div>

  </div>

  <script>
    function togglePassword() {
      const pass = document.getElementById("password_mem");
      if (pass.type === "password") {
        pass.type = "text";
      } else {
        pass.type = "password";
      }
    }
  </script>

  <?php

  if (isset($_POST['submit'])) {
    if (isset($_POST['email_mem']) && isset($_POST['password_mem'])) {

      $email_mem = trim($_POST['email_mem']);
      $password_mem = trim($_POST['password_mem']);

      try {
        $stmt = $con->prepare(
          "SELECT * FROM members 
         WHERE email_mem = '" . $email_mem . "' 
         AND password_mem = '" . $password_mem . "'"
        );
        $stmt->execute();
        $em = $stmt->fetch();

        if ($em == true) {
          $_SESSION["id_mem"] = $em['id_mem'];
          $_SESSION["name_mem"] = $em['name_mem'];
          $_SESSION["email_mem"] = $em['email_mem'];

          echo "<script>alert('ยินดีต้อนรับเข้าสู่ระบบ');</script>";
          echo "<script>location.replace('searchpage.php')</script>";
        } else {
          echo "<script>alert('กรุณาใส่ E-mail และ Password ให้ถูกต้อง');</script>";
          echo "<script>location.replace('loginpage.php')</script>";
        }

      } catch (Exception $e) {
        $e->getMessage();
      }
    }
  }
  ?>

</body>

</html>