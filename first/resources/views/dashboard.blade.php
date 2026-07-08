<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .navbar {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .navbar h2 {
            color: #333;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        .welcome-box {
            background: white;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .welcome-box h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 32px;
        }

        .welcome-box p {
            color: #666;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .user-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 30px;
            text-align: left;
        }

        .user-info p {
            color: #333;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar">
            <h2>Dashboard</h2>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>

        <div class="welcome-box">
            <h1>Welcome to Dashboard! 🎉</h1>
            <p>Aap successfully login ho gaye ho!</p>

            <div class="user-info">
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
            </div>
        </div>
    </div>
</body>
</html>
