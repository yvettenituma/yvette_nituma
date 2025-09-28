<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body, section {
      width: 100%;
      height: 100vh;
      background: linear-gradient(to bottom right, #f5f5f5, #e5e5e5, #d4d4d4);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }

    /* Background Blobs - grey tones */
    .blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(60px);
      opacity: 0.4;
      animation: float 8s ease-in-out infinite;
    }
    .blob1 {
      width: 350px;
      height: 350px;
      background: #9ca3af; /* grey-400 */
      top: -80px;
      left: -80px;
    }
    .blob2 {
      width: 250px;
      height: 250px;
      background: #6b7280; /* grey-500 */
      bottom: -60px;
      right: -60px;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% { transform: translateY(0) translateX(0); }
      50% { transform: translateY(30px) translateX(20px); }
    }

    .login {
      background: rgba(255, 255, 255, 0.8);
      padding: 50px 40px;
      width: 500px;
      border-radius: 20px;
      box-shadow: 0 20px 40px rgba(0,0,0,0.1);
      border: 1px solid #d1d5db; /* grey-300 */
      backdrop-filter: blur(12px);
      position: relative;
      z-index: 1;
      animation: fadeIn 0.8s ease;
    }

    .login h2 {
      text-align: center;
      font-size: 2em;
      font-weight: 600;
      color: #111827; /* black */
      margin-bottom: 25px;
    }

    .login input,
    .login select {
      width: 100%;
      padding: 14px 20px;
      margin-bottom: 18px;
      font-size: 1.05em;
      border-radius: 8px;
      border: 1px solid #9ca3af; /* grey-400 */
      background: #f9fafb; /* grey-50 */
      color: #111827; /* black */
      outline: none;
      transition: all 0.3s ease;
    }

    .login input:focus,
    .login select:focus {
      box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.3); /* grey glow */
      transform: scale(1.02);
    }

    .login input::placeholder {
      color: #6b7280; /* grey-500 */
    }

    .password-box {
      position: relative;
    }

    .password-box i {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #4b5563; /* grey-600 */
    }

    #btn {
      width: 100%;
      padding: 15px;
      font-size: 1.2em;
      font-weight: 500;
      border: none;
      border-radius: 10px;
      background: #111827; /* black */
      color: white;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    }

    #btn:hover {
      background: #374151; /* grey-800 */
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.4);
    }

    .group {
      text-align: center;
      margin-top: 10px;
    }

    .group a {
      color: #1f2937; /* grey-900 */
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s;
    }

    .group a:hover {
      text-decoration: underline;
      color: #000;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <!-- Animated Background Blobs -->
  <div class="blob blob1"></div>
  <div class="blob blob2"></div>

  <section>
    <div class="login">
      <h2>Register</h2>
      <form method="POST" action="<?= site_url('reg/register'); ?>" class="inputBox">

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>

        <div class="password-box">
          <input type="password" id="password" name="password" placeholder="Password" required>
          <i class="fa-solid fa-eye" id="togglePassword"></i>
        </div>

        <div class="password-box">
          <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
          <i class="fa-solid fa-eye" id="toggleConfirmPassword"></i>
        </div>

        <select name="role" required>
          <option value="user" selected>User</option>
          <option value="admin">Admin</option>
        </select>

        <button type="submit" id="btn">Register</button>
      </form>

      <div class="group">
        <p>Already have an account? <a href="<?= site_url('reg/login'); ?>">Login here</a></p>
      </div>
    </div>
  </section>

  <script>
    function toggleVisibility(toggleId, inputId) {
      const toggle = document.getElementById(toggleId);
      const input = document.getElementById(inputId);

      toggle.addEventListener('click', function () {
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    }

    toggleVisibility('togglePassword', 'password');
    toggleVisibility('toggleConfirmPassword', 'confirmPassword');
  </script>
</body>
</html>
