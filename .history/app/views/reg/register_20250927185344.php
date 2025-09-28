<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        section {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: linear-gradient(135deg, #ffdde1, #fbc6d0, #f8a5c2);
            overflow: hidden;
        }

        .login {
            position: relative;
            padding: 60px;
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            width: 500px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        }

        .login h2 {
            text-align: center;
            font-size: 2.5em;
            font-weight: 600;
            color: #d63384;
            margin-bottom: 10px;
        }

        .login .inputBox input,
        .login .inputBox select {
            width: 100%;
            padding: 15px 20px;
            outline: none;
            font-size: 1.1em;
            color: #d63384;
            border-radius: 5px;
            background: #fff;
            border: none;
            margin-bottom: 20px;
        }

        .login .inputBox ::placeholder {
            color: #d63384;
        }

        .login .inputBox #btn {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            background: #d63384;
            color: #fff;
            cursor: pointer;
            font-size: 1.25em;
            font-weight: 500;
            border-radius: 5px;
            transition: 0.5s;
        }

        .login .inputBox #btn:hover {
            background: #e75493;
        }

        .login .group {
            text-align: center;
        }

        .login .group a {
            font-size: 1.1em;
            color: #d63384;
            font-weight: 500;
            text-decoration: none;
        }

        .login .group a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section>
        <div class="login">
            <h2>Register</h2>
            <form method="POST" action="<?= site_url('reg/register'); ?>" class="inputBox">

                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="email" name="email" placeholder="Email" required>

                <!-- Password field -->
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="password" id="password" name="password" placeholder="Password" required 
                        style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
                    <i class="fa-solid fa-eye" id="togglePassword" 
                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #d63384;"></i>
                </div>

                <!-- Confirm Password field -->
                <div style="position: relative; margin-bottom: 20px;">
                    <input type="password" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required 
                        style="width: 100%; padding: 15px 45px 15px 20px; border-radius: 5px; border: none; font-size: 1.1em;">
                    <i class="fa-solid fa-eye" id="toggleConfirmPassword" 
                    style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #d63384;"></i>
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
