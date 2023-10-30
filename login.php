<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
</head>
<body>

<div class="container">
      <div class="login-container">
        <h1>Login</h1>
        <form action="" method="post">
          <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required />
          </div>
          <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />
          </div>
          <a href="#" class="forgot-password">Lupa Password?</a>
          <div class="input-group">
           <button type="submit">Login</button>
          </div>
        </form>

<style>
body {
  margin: 0;
  padding: 0;
}

.container {
  font-family: "Poppins", sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f6f6f6;
}

.login-container {
  background-color: #fff;
  padding: 30px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  width: 300px;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

.input-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
}

input[type="text"],
input[type="password"] {
  width: 95%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

button {
  width: 100%;
  padding: 10px;
  background-color: #50C878;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #98FB98;
}

.forgot-password {
  display: block;
  text-align: right;
  text-decoration: none;
  color: #007bff;
  margin-bottom: 10px;
}
</style>
</body>
</html>