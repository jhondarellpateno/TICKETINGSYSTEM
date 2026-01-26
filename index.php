<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crimson Edge | Modern Landing Page</title>
    <style>
        /* --- General Styles --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #0f0f0f;
            color: #ffffff;
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("style/back.jpg"); 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            
            filter: blur(8px); 
            
            transform: scale(1.1); 
            z-index: -1; 
        }

        /* --- Header --- */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10%;
            background: rgba(0, 0, 0, 0.8);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff2e2e;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        nav a {
            color: #ddd;
            text-decoration: none;
            margin-left: 30px;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #ff2e2e;
        }

        /* --- Hero Section --- */
        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 10%;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            background: linear-gradient(to right, #ce6464, #000000);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            color: #3f2121;
            margin-bottom: 30px;
        }

        .cta-btn {
            padding: 15px 40px;
            background-color: #b30000;
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(179, 0, 0, 0.4);
        }

        .cta-btn:hover {
            background-color: #ff2e2e;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 46, 46, 0.6);
        }

        /* --- Features Section --- */
        .features {
            padding: 100px 10%;
            display: flex;
            justify-content: space-between;
            gap: 30px;
        }

        .feature-card {
            background: #1a1a1a;
            padding: 40px;
            border-radius: 20px;
            flex: 1;
            text-align: center;
            transition: transform 0.3s, border 0.3s;
            border: 1px solid #333;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: #ff2e2e;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: #ff4d4d;
        }

        .feature-card p {
            color: #aaa;
            font-size: 0.95rem;
        }

        /* --- Footer --- */
        footer {
            padding: 40px 10%;
            background: #080808;
            text-align: center;
            border-top: 1px solid #222;
            color: #555;
            font-size: 0.9rem;
        }

        footer span {
            color: #ff2e2e;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Concert Ticket<span> Booking System</span></div>
        <nav>
            <a href="#">Home</a>
            <a href="#features">Features</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Own the Moment.</h1>
        <p>Experience the next generation of live music access. We combine a bold aesthetic with lightning-fast booking to keep you in the rhythm.</p>
        <a href="login.php" class="cta-btn">Get Started Now</a>
    </section>

    <section class="features" id="features">
        <div class="feature-card">
            <h3>Real-Time Seat Mapping</h3>
            <p>An interactive, dynamic seating chart that allows users to pick their exact spot in the arena with live availability updates.</p>
        </div>
        <div class="feature-card">
            <h3>Secure Payment Gateway</h3>
            <p>Integrated industry-standard encryption to ensure that every transaction is safe, supporting multiple payment methods from credit cards to digital wallets.</p>
        </div>
        <div class="feature-card">
            <h3>Automated E-Ticketing</h3>
            <p>Instant delivery of QR-coded tickets to the user's email or mobile app, eliminating the need for physical printing and reducing entry wait times.</p>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Concert Booking. Built with <span>&hearts;</span>.</p>
    </footer>

</body>
</html>