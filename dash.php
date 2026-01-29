<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$user_email = $_SESSION['email'];
$display_name = ucwords(str_replace(['.', '_'], ' ', explode('@', $user_email)[0]));
?>

<!DOCTYPE html>
<head>
    <title>CrimsonGate | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #080808;
            --sidebar-bg: rgba(15, 15, 15, 0.95);
            --accent-red: #ff2e2e;
            --accent-dim: #b30000;
            --card-glass: rgba(255, 255, 255, 0.03);
            --card-border: rgba(255, 255, 255, 0.08);
            --text-main: #ffffff;
            --text-dim: #a0a0a0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            background-image: radial-gradient(circle at 50% -20%, #4b0000 0%, #080808 80%);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            backdrop-filter: blur(15px);
            border-right: 1px solid var(--card-border);
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.2rem;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: 2px;
            color: var(--accent-red);
            margin-bottom: 3rem;
            text-align: center;
        }

        .logo span {
            color: white;
        }

        nav ul {
            list-style: none;
        }

        nav ul li {
            margin-bottom: 0.8rem;
        }

        nav ul li a {
            text-decoration: none;
            color: var(--text-dim);
            display: flex;
            align-items: center;
            padding: 0.9rem 1.2rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        nav ul li a i {
            width: 30px;
            font-size: 1.2rem;
        }

        nav ul li.active a,
        nav ul li a:hover {
            background: rgba(255, 46, 46, 0.1);
            color: var(--accent-red);
            box-shadow: inset 0 0 10px rgba(255, 46, 46, 0.05);
        }

        .logout-section {
            margin-top: auto;
            padding-top: 1.5rem;
            border-top: 1px solid var(--card-border);
        }

        .logout-section a {
            color: #ff4444;
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 0.9rem 1.2rem;
            transition: 0.3s;
        }

        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 2.5rem 4rem;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        header h1 {
            font-weight: 800;
            font-size: 1.8rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
            background: var(--card-glass);
            padding: 8px 20px 8px 8px;
            border-radius: 50px;
            border: 1px solid var(--card-border);
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--accent-red);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 3rem;
        }

        .card {
            background: var(--card-glass);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: 0.3s;
        }

        .card:hover {
            border-color: var(--accent-red);
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.05);
        }

        .card h3 {
            color: var(--text-dim);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .card .value {
            font-size: 2.5rem;
            font-weight: 800;
            margin-top: 10px;
        }

        .activity-section {
            background: var(--card-glass);
            border-radius: 20px;
            padding: 2rem;
            border: 1px solid var(--card-border);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            color: var(--text-dim);
            padding: 1.2rem;
            font-size: 0.8rem;
            letter-spacing: 1px;
            border-bottom: 1px solid var(--card-border);
        }

        td {
            padding: 1.2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            font-size: 0.95rem;
        }

        .status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .status.booked {
            background: rgba(0, 255, 136, 0.1);
            color: #00ff88;
            border: 1px solid rgba(0, 255, 136, 0.2);
        }

        .action-btn {
            background: var(--accent-red);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.8rem;
            cursor: pointer;
            transition: 0.3s;
        }

        .action-btn:hover {
            background: white;
            color: black;
        }

        @media (max-width: 1024px) {
            .main-content {
                padding: 2rem;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="logo">CRIMSON<span>GATE</span></div>
        <nav>
            <ul>
                <li class="active"><a href="#"><i class="fas fa-th-large"></i> <span class="nav-text">Dashboard</span></a></li>
                <li><a href="ticket.html"><i class="fas fa-ticket-alt"></i> <span class="nav-text">My Tickets</span></a></li>
                <li><a href="discover.html"><i class="fas fa-compass"></i> <span class="nav-text">Discover</span></a></li>
                <li><a href="billing.html"><i class="fas fa-wallet"></i> <span class="nav-text">Billing</span></a></li>
            </ul>
        </nav>
        <div class="logout-section">
            <a href="index.php">
                <i class="fas fa-sign-out-alt"></i> <span class="logout-text">Sign Out</span>
            </a>
        </div>
    </aside>

    <main class="main-content">
        <header>
            <div>
                <p style="color: var(--accent-red); font-weight: 700; font-size: 0.8rem; text-transform: uppercase;">Portal Access Active</p>
                <h1>Welcome, <?php echo $display_name; ?></h1>
            </div>
            <div class="user-profile">
                <img src="https://ui-avatars.com/api/?name=<?php echo $display_name; ?>&background=ff2e2e&color=fff" alt="User">
                <span style="font-weight: 600;"><?php echo $display_name; ?></span>
            </div>
        </header>

        <section class="stats-grid">
            <div class="card">
                <h3>Active Tickets</h3>
                <div class="value">14</div>
            </div>
            <div class="card">
                <h3>Live Alerts</h3>
                <div class="value" style="color: var(--accent-red);">02</div>
            </div>
            <div class="card">
                <h3>Points</h3>
                <div class="value">1,250</div>
            </div>
        </section>

        <section class="activity-section">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                <h2>Recent Orders</h2>
                <a href="#" style="color: var(--accent-red); text-decoration: none; font-size: 0.8rem; font-weight: 700;">VIEW ALL</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>EVENT</th>
                        <th>DATE</th>
                        <th>SEAT</th>
                        <th>STATUS</th>
                        <th>ENTRY PASS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-weight: 700;">Crimson Rock Fest 2026</td>
                        <td>Jan 30, 2026</td>
                        <td>VIP-A12</td>
                        <td><span class="status booked">VALID</span></td>
                        <td><button class="action-btn">VIEW QR</button></td>
                    </tr>
                    <tr>
                        <td style="font-weight: 700;">Midnight Jazz Sessions</td>
                        <td>Feb 05, 2026</td>
                        <td>GEN-AD</td>
                        <td><span class="status booked">VALID</span></td>
                        <td><button class="action-btn">VIEW QR</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

</body>

</html>