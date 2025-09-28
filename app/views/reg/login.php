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
      background: linear-gradient(to bottom right, #f5f5f5, #e5e5e5, #d4d4d4); /* greys */
    }

    .login {
      background: white;
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      border: 1px solid #d1d5db; /* grey-300 */
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #111827; /* near black */
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
      color: #111827;
      border-radius: 8px;
      background: #f9fafb; /* grey-50 */
      border: 1px solid #9ca3af; /* grey-400 */
      outline: none;
      transition: all 0.3s ease;
    }

    .inputBox input:focus {
      border-color: #6b7280; /* grey-500 */
      box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.3);
    }

    .inputBox ::placeholder {
      color: #6b7280; /* grey-500 */
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      font-size: 1.1em;
      color: #4b5563; /* grey-600 */
    }

    button {
      width: 100%;
      padding: 15px;
      border: none;
      background: #111827; /* black */
      color: #fff;
      font-size: 1.15em;
      font-weight: 500;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    button:hover {
      background: #374151; /* dark grey */
    }

    .group {
      text-align: center;
    }

    .group a {
      font-size: 1em;
      color: #1f2937; /* dark grey */
      font-weight: 500;
      text-decoration: none;
    }

    .group a:hover {
      text-decoration: underline;
      color: #000;
    }

    .error-box {
      background: rgba(107, 114, 128, 0.1); /* light grey bg */
      color: #111827;
      padding: 10px;
      border: 1px solid #6b7280;
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
