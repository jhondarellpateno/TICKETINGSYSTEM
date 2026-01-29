<!DOCTYPE html>
<head>

    <title>CrimsonGate | Experience the Sound</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', sans-serif;
        }

        body {
            background-image: url("style/back.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            line-height: 1.6;
            overflow-x: hidden;
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(15px);
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 900;
            color: #ff2e2e;
            text-transform: uppercase;
            letter-spacing: 3px;
            transition: 0.3s;
            cursor: pointer;
        }

        .logo:hover {
            text-shadow: 0 0 15px #ff2e2e;
            transform: scale(1.05);
        }

        nav a {
            color: #bbb;
            text-decoration: none;
            margin-left: 35px;
            font-weight: 500;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.4s;
            position: relative;
        }

        nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #ff2e2e;
            transition: 0.3s;
        }

        nav a:hover {
            color: #fff;
        }

        nav a:hover::after {
            width: 100%;
        }

        .hero {
            height: 85vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 10%;
        }

        .hero h1 {
            font-size: clamp(3rem, 8vw, 5rem);
            font-weight: 900;
            margin-bottom: 20px;
            background: linear-gradient(to bottom, #ffffff 30%, #ff2e2e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -2px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            color: #d8d0d0;
            margin-bottom: 40px;
        }

        .cta-btn {
            padding: 18px 50px;
            background-color: #b30000;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(179, 0, 0, 0.3);
        }

        .cta-btn:hover {
            background-color: #ff2e2e;
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(255, 46, 46, 0.5);
        }

        .features {
            padding: 100px 10%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            padding: 50px 40px;
            border-radius: 24px;
            text-align: left;
            transition: all 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(800px circle at var(--x) var(--y), rgba(255,46,46,0.15), transparent 40%);
            z-index: 0;
            opacity: 0;
            transition: opacity 0.5s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 46, 46, 0.4);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .feature-card:hover h3 {
            color: #ff2e2e;
            transform: translateX(5px);
        }

        .feature-card i {
            font-size: 2.5rem;
            color: #ff2e2e;
            margin-bottom: 25px;
            display: block;
            transition: 0.4s;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: #fff;
            transition: 0.3s;
        }

        .feature-card p {
            color: #ffffff;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        footer {
            padding: 25px 10%; 
            background: rgba(0, 0, 0, 0.85); 
            backdrop-filter: blur(10px);
            text-align: center;
            border-top: 1px solid rgba(255, 46, 46, 0.2);
            color: #777;
            font-size: 0.85rem; 
            letter-spacing: 0.5px;
        }

        footer p {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        footer span {
            color: #ff2e2e;
            font-size: 1rem;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        footer:hover span {
            transform: scale(1.3);
            text-shadow: 0 0 10px #ff2e2e;
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">CrimsonGate</div>
        <nav>
            <a href="#features">Features</a>
            <a href="contact.html">Contact</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Own the Moment.</h1>
        <p>The premier gateway for live music in the Philippines. Bold aesthetics, secure access, and the best seats in the house.</p>
        <a href="login.php" class="cta-btn">Get Started Now</a>
    </section>

    <section class="features" id="features">
        <div class="feature-card">
            <i class="fas fa-map-marked-alt"></i>
            <h3>Live Mapping</h3>
            <p>Pick your exact spot with our high-fidelity interactive arena charts. Real-time availability at your fingertips.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-shield-alt"></i>
            <h3>Ironclad Security</h3>
            <p>Industry-leading encryption protecting every transaction. Support for digital wallets and local banking.</p>
        </div>
        <div class="feature-card">
            <i class="fas fa-bolt"></i>
            <h3>Instant Entry</h3>
            <p>No lines, no paper. Receive your QR-coded dynamic tickets instantly to your mobile device.</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 CrimsonGate Concerts. Built with &hearts;</p>
    </footer>

</body>
</html>