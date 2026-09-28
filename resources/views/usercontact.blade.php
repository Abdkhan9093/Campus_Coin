<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact | Campus Coin</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <header class="navbar">

        <a href="/user" class="logo">
            <i class="fa-solid fa-wallet"></i>
            <span>CampusCoin</span>
        </a>

        <nav>
            <a class="active" href="/user">Home</a>
            <a href="/income">Income</a>
            <a href="/expenses">Expenses</a>
            <a href="/history">History</a>
            <a href="/contact">Contact</a>
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </nav>

    </header>

    <main class="page">

        <div class="page-heading">

            <div class="section-label">
                GET IN TOUCH
            </div>

            <h1>
                Contact <span>Campus Coin</span>
            </h1>

            <p>
                Have a question or suggestion?
                We would love to hear from you.
            </p>

        </div>

        <div class="contact-layout">

            <div class="contact-info-card">

                <img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?auto=format&fit=crop&w=1000&q=80"
                    alt="Contact team">

                <div class="contact-info-content">

                    <h2>
                        Let's Talk
                    </h2>

                    <p>
                        If you have feedback, suggestions,
                        or questions about Campus Coin,
                        feel free to contact us.
                    </p>

                    <div class="contact-detail">

                        <div class="contact-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>

                        <div>
                            <h4>Email</h4>

                            <p>
                                support@campuscoin.com
                            </p>
                        </div>

                    </div>

                    <div class="contact-detail">

                        <div class="contact-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <div>
                            <h4>Phone</h4>

                            <p>
                                +92 300 1234567
                            </p>
                        </div>

                    </div>

                    <div class="contact-detail">

                        <div class="contact-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <div>
                            <h4>Location</h4>

                            <p>
                                Karachi, Pakistan
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <div class="contact-form-card">

                <div class="form-icon">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>

                <h2>
                    Send Us A Message
                </h2>

                <p>
                    Fill out the form and send your
                    message to Campus Coin.
                </p>

                <form onsubmit="sendMessage(event)">

                    <label>
                        Full Name
                    </label>

                    <input type="text" placeholder="Your full name" required>

                    <label>
                        Email Address
                    </label>

                    <input type="email" placeholder="your@email.com" required>

                    <label>
                        Subject
                    </label>

                    <input type="text" placeholder="How can we help?" required>

                    <label>
                        Message
                    </label>

                    <textarea rows="6" placeholder="Write your message here..." required></textarea>

                    <button type="submit" class="full-btn">

                        Send Message

                        <i class="fa-solid fa-paper-plane"></i>

                    </button>

                </form>

            </div>

        </div>

    </main>

    <footer>

        <div class="footer-grid">

            <div>

                <div class="footer-logo">
                    <i class="fa-solid fa-wallet"></i>
                    Campus<span>Coin</span>
                </div>

                <p>
                    Professional and simple personal
                    budget management.
                </p>

            </div>

            <div>

                <h3>Quick Links</h3>

                <a href="/user">Home</a>
                <a href="/income">Income</a>
                <a href="/expenses">Expenses</a>
                <a href="/history">History</a>
                <a href="/contact">Contact</a>
                <a href="/login">Login</a>
                <a href="/register">Register</a>

            </div>

            <div>

                <h3>Contact</h3>

                <p>support@campuscoin.com</p>
                <p>+92 300 1234567</p>
                <p>Karachi, Pakistan</p>

            </div>

        </div>

        <div class="copyright">
            © 2026 Campus Coin. All Rights Reserved.
        </div>

    </footer>

    <script src="js/script.js"></script>

</body>

</html>