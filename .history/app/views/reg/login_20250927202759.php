<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, html {
      width: 100%;
      height: 100%;
    }

    section {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 100vh;
      background: linear-gradient(to bottom right, #fbcfe8, #fce7f3, #f9a8d4);
    }

    .login {
      background: white;
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      border: 1px solid #f9a8d4;
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #db2777;
      margin-bottom: 10px;
    }

    .inputBox {
      position: relative;
      margin-bottom: 15px;
    }

    .inputBox input {
      width: 100%;
      padding: 15px 45px 15px 20px;
      font-size: 1.1em;
      color: #a21caf;
      border-radius: 8px;
      background: #fdf2f8;
      border: 1px solid #fbcfe8;
      outline: none;
    }

    .inputBox ::placeholder {
      color: #d63384;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #d63384;
    }

    button {
      width: 100%;
      padding: 15px;
      border: none;
      background: #ec4899;
      color: #fff;
      font-size: 1.15em;
      font-weight: 500;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #db2777;
    }

    .group {
      text-align: center;
    }

    .group a {
      font-size: 1em;
      color: #d63384;
      font-weight: 500;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }

    .error-box {
      background: rgba(255,0,0,0.08);
      color: #db2777;
      padding: 10px;
      border: 1px solid #db2777;
      border-radius: 8px;
      text-align: center;
      font-size: 0.95em;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <section>
    <div class="login">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div class="error-box">
          <?= $error ?>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= site_url('reg/login') ?>">
        <div class="inputBox">
          <input type="text" placeholder="Username" name="username" required>
        </div>

        <div class="inputBox">
          <input type="password" placeholder="Password" name="password" id="password" required>
          <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
        </div>

        <button type="submit" id="btn">Login</button>
      </form>

      <div class="group">
        <p style="font-size: 0.9em;">
          Don't have an account? <a href="<?= site_url('reg/register'); ?>">Register here</a>
        </p>
      </div>
    </div>
  </section>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>
</body>
</html>
