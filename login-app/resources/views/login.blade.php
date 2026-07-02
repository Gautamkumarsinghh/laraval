<!DOCTYPE html>
<html>
<head>
    <title>Laravel Login</title>
</head>
<body>

<h2>Login Page</h2>

<form action="/login" method="POST">
    @csrf

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Password</label><br>
    <input type="password" name="password"><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
