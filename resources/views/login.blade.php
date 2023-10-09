@extends('layout/template')

@section('title', 'Registrar Usuarios')

@section('contenido')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;  
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .password-container {
            position: relative;
            width: 100%;
        }
        .password-container input {
            padding-right: 40px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="login-container">        
        <h1>Login</h1>
        <br>
        <br>
        <form action="{{ route('usuarios.index') }}" method="get">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <span class="toggle-password" id="toggle-password">👁️</span>
            </div>
            <br>
            <br>
            <button type="submit">Login</button>
        </form>
        
        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">Olvidaste tu <a href="#">contraseña?</a></span>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <span class="psw">No tienes cuenta? <a href="{{ route('usuarios.create') }}">Crea una cuenta?</a></span>
        </div>
    </div>
    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var togglePasswordButton = document.getElementById('toggle-password');

            // Chequear el tipo de campo y cambiarlo, además de cambiar el ícono
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                togglePasswordButton.textContent = '🙈'; // Ojo tachado
            } else {
                passwordField.type = 'password';
                togglePasswordButton.textContent = '👁️'; // Ojo
            }
        });       
    </script>
</body>
</html>
