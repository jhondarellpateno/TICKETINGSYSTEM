<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Get the user's email from the session
$user_email = $_SESSION['email'];
$username = explode('@', $user_email)[0]; // Simple trick to get a 'name' from email
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Crimson Edge</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            display: flex;
            background-color: #0a0a0b;
            color: white;
            min-height: 100vh;
        }

        /* --- Sidebar --- */
        .sidebar {
            width: 260px;
            background-color: #111;
            border-right: 1px solid #222;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .sidebar h2 {
            color: #ff2e2e;
            font-size: 1.2rem;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .nav-links {
            list-style: none;
            flex-grow: 1;
        }

        .nav-links li {
            margin-bottom: 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #aaa;
            display: block;
            padding: 12px 15px;
            border-radius: 8px;
            transition: 0.3s;
        }

        .nav-links a:hover, .nav-links a.active {
            background: #b30000;
            color: white;
        }

        .logout-btn {
            color: #ff5555;
            text-decoration: none;
            padding: 10px;
            font-size: 0.9rem;
            border-top: 1px solid #222;
            padding-top: 20px;
        }

        /* --- Main Content --- */
        .main-content {
            flex-grow: 1;
            padding: 40px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .welcome-box h1 {
            font-size: 2rem;
        }

        .welcome-box span {
            color: #ff4d4d;
        }

        /* --- Stats Grid --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #1a1a1c;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #222;
            text-align: center;
        }

        .stat-card h3 {
            font-size: 0.8rem;
            color: #888;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff2e2e;
        }

        /* --- Simple Table --- */
        .recent-activity {
            background: #1a1a1c;
            padding: 25px;
            border-radius: 15px;
            border: 1px solid #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            text-align: left;
            color: #555;
            font-size: 0.8rem;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        td {
            padding: 15px 0;
            border-bottom: 1px solid #222;
            font-size: 0.9rem;
        }
    </style>
    
</head>
<body>

    <div class="sidebar">
        <h2>Concert Ticket Booking</h2>
        <ul class="nav-links">
            <li><a href="#" class="active">Dashboard</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Settings</a></li>
        </ul>
        <a href="index.php" class="logout-btn">Logout Account</a>
    </div>

    <div class="main-content">
        <header>
            <div class="welcome-box">
                <h1>Welcome back, <span><?php echo ucfirst($username); ?>!</span></h1>
                <p style="color: #666;">Here is what's happening today.</p>
            </div>
            <div class="user-badge" style="background: #222; padding: 10px 20px; border-radius: 50px; font-size: 0.8rem;">
                <?php echo $user_email; ?>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Views</h3>
                <p>12,402</p>
            </div>
            <div class="stat-card">
                <h3>Revenue</h3>
                <p>$1,280</p>
            </div>
            <div class="stat-card">
                <h3>New Users</h3>
                <p>48</p>
            </div>
        </div>

        <div class="recent-activity">
            <h2>Recent Activity</h2>
            <table>
                <thead>
                    <tr>
                        <th>ACTION</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Logged into System</td>
                        <td>Oct 24, 2023</td>
                        <td style="color: #00ff00;">Success</td>
                    </tr>
                    <tr>
                        <td>Updated Profile Picture</td>
                        <td>Oct 23, 2023</td>
                        <td style="color: #00ff00;">Success</td>
                    </tr>
                    <tr>
                        <td>Password Change Attempt</td>
                        <td>Oct 20, 2023</td>
                        <td style="color: #ffaa00;">Pending</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>