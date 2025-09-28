<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Font Awesome for eye icon -->
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
      background: linear-gradient(135deg, #f8c1d9, #f6a4c3);
    }

    .login {
      position: relative;
      padding: 60px;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(15px);
      border: 1px solid #fff;
      border-bottom: 1px solid rgba(255, 255, 255, 0.5);
      border-right: 1px solid rgba(255, 255, 255, 0.5);
      border-radius: 20px;
      width: 500px;
      display: flex;
      flex-direction: column;
      gap: 30px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
      z-index: 200;
    }

    .login h2 {
      text-align: center;
      font-size: 2.5em;
      font-weight: 600;
      color: #ec4899; /* Changed from #8f2c24 */
    }

    .login .inputBox {
      position: relative;
      margin-bottom: 20px;
    }

    .login .inputBox input {
      width: 100%;
      padding: 15px 45px 15px 20px;
      font-size: 1.25em;
      color: #ec4899; /* Changed from #8f2c24 */
      border-radius: 5px;
      background: #fff;
      border: none;
    }

    .login .inputBox ::placeholder {
      color: #ec4899; /* Changed from #8f2c24 */
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.2em;
      color: #ec4899; /* Changed from #8f2c24 */
    }

    .login button {
      width: 100%;
      padding: 15px;
      border: none;
      background: #ec4899; /* Main pink */
      color: #fff;
      font-size: 1.25em;
      font-weight: 500;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login button:hover {
      background: #db2777; /* Hover pink */
    }

    .group {
      text-align: center;
    }

    .group a {
      font-size: 1em;
      color: #ec4899; /* Changed from #8f2c24 */
      font-weight: 500;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <section>

    <div class="login">
      <h2>Login</h2>

      <?php if (!empty($error)): ?>
        <div style="background: rgba(255,0,0,0.1); color: #db2777; padding: 10px; border: 1px solid #db2777; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 0.95em;">
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
