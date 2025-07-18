<?php
session_start();
if (isset($_SESSION['success_message'])) {
    echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
    unset($_SESSION['success_message']); // Clear the message
}

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Classes - Virtual Study Groups Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color:rgb(79, 67, 241);
            --secondary-color: #1e40af;
            --success-color: #16a34a;
            --warning-color: #ca8a04;
            --background-color:rgb(189, 188, 199);
            --border-color:rgb(202, 207, 214);
            --box-shadow-color: rgba(0, 0, 0, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            line-height: 1.6;
            color:rgba(150, 35, 226, 0.91);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 8px var(--box-shadow-color);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--border-color);
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .back-to-dashboard-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-to-dashboard-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
        }

        .class-filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .filter-btn {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 25px;
            background: white;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .weekly-schedule {
            display: grid;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .class-card {
            background: white;
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            gap: 1.5rem;
            align-items: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .class-card:hover {
            box-shadow: 0 4px 8px var(--box-shadow-color);
            transform: translateY(-5px);
        }

        .class-time {
            text-align: center;
        }

        .class-date {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .class-hour {
            color: #64748b;
        }

        .class-details h3 {
            font-size: 1.5rem;
            color:rgb(0, 0, 0);
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .class-info {
            display: flex;
            gap: 1.5rem;
            color: #64748b;
            font-size: 0.9rem;
        }

        .class-info span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .class-tags {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .tag {
            padding: 0.25rem 0.75rem;
            background: #f1f5f9;
            border-radius: 999px;
            font-size: 0.8rem;
            color: #64748b;
        }

        .class-action {
            text-align: right;
        }

        .register-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background-color: var(--success-color);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .register-btn:hover {
            opacity: 0.9;
            transform: translateY(-3px);
        }

        .register-btn.registered {
            background-color: var(--warning-color);
        }

        .seats-left {
            display: block;
            font-size: 0.9rem;
            color: #64748b;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .container {
                margin: 1rem;
                padding: 1rem;
            }

            .class-card {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .class-action {
                text-align: center;
            }

            .class-info {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Interactive Classes</h1>
            <a href="dashboard.php" class="back-to-dashboard-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="class-filters">
            <button class="filter-btn active">All Classes</button>
            <button class="filter-btn">Mathematics</button>
            <button class="filter-btn">Computer Science</button>
            <button class="filter-btn">Electrical Engineering</button>
            <button class="filter-btn">Electronics</button>
        </div>

        <div class="weekly-schedule">
            <div class="class-card">
                <div class="class-time">
                    <div class="class-date">Monday</div>
                    <div class="class-hour">09:00 - 10:30 AM</div>
                </div>
                <div class="class-details">
                    <h3>Engineering Mathematics 3</h3>
                    <div class="class-info">
                        <span><i class="fas fa-user"></i> Prof. W.K Deemantha</span>
                        <span><i class="fas fa-users"></i> 30 Students Max</span>
                        <span><i class="fas fa-clock"></i> 90 Minutes</span>
                    </div>
                    <div class="class-tags">
                        <span class="tag">Mathematics</span>
                        <span class="tag">Advanced</span>
                        <span class="tag">Interactive</span>
                    </div>
                </div>
                <div class="class-action">
                    <form id="registerForm" action="register_class.php" method="POST" onsubmit="return handleFormSubmit(event)">
                        <input type="hidden" name="class_name" value="Engineering Mathematics 3">
                        <button id="registerBtn" type="submit" class="register-btn">
                            <i class="fas fa-check-circle"></i> Register
                        </button>
                    </form>
                    <span class="seats-left">5 seats left</span>
                </div>
                <div id="successMessage" style="display:none; color: green; margin-top: 10px;">
                    You successfully registered for Engineering Mathematics 3. We have sent the class details to your email.
                </div>
            </div>

            <div class="class-card">
                <div class="class-time">
                    <div class="class-date">Tuesday</div>
                    <div class="class-hour">11:00 - 12:30 PM</div>
                </div>
                <div class="class-details">
                    <h3>Introduction To Python</h3>
                    <div class="class-info">
                        <span><i class="fas fa-user"></i> Dr. M.K Perera</span>
                        <span><i class="fas fa-users"></i> 25 Students Max</span>
                        <span><i class="fas fa-clock"></i> 90 Minutes</span>
                    </div>
                    <div class="class-tags">
                        <span class="tag">Computer Science</span>
                        <span class="tag">Intermediate</span>
                        <span class="tag">Live Demo</span>
                    </div>
                </div>
                <div class="class-action">
                    <button class="register-btn registered">
                        <i class="fas fa-check"></i> Registered
                    </button>
                    <span class="seats-left">8 seats left</span>
                </div>
            </div>

            <div class="class-card">
                <div class="class-time">
                    <div class="class-date">Wednesday</div>
                    <div class="class-hour">02:00 - 03:30 PM</div>
                </div>
                <div class="class-details">
                    <h3>Electronics 2</h3>
                    <div class="class-info">
                        <span><i class="fas fa-user"></i> Prof. D. Wijesuuriya</span>
                        <span><i class="fas fa-users"></i> 20 Students Max</span>
                        <span><i class="fas fa-clock"></i> 90 Minutes</span>
                    </div>
                    <div class="class-tags">
                        <span class="tag">Electronics</span>
                        <span class="tag">Advanced</span>
                        <span class="tag">Lab Work</span>
                    </div>
                </div>
                <div class="class-action">
                    <form id="registerForm" action="register_class.php" method="POST" onsubmit="return handleFormSubmit(event)">
                        <input type="hidden" name="class_name" value="Engineering Mathematics 3">
                        <button id="registerBtn" type="submit" class="register-btn">
                            <i class="fas fa-check-circle"></i> Register
                        </button>
                    </form>
                    <span class="seats-left">5 seats left</span>
                </div>
                <div id="successMessage" style="display:none; color: green; margin-top: 10px;">
                    You successfully registered for Engineering Mathematics 3. We have sent the class details to your email.
                </div>
            </div>
        </div>
    </div>
    <script>
        function handleFormSubmit(event) {
            event.preventDefault(); // Prevent the default form submission

            // Display the success message
            document.getElementById('successMessage').style.display = 'block';

            // Optionally, you can hide the register button to prevent multiple submissions
            document.getElementById('registerBtn').style.display = 'none';

            // Here you can also send the form data to the server using AJAX if needed
            // For example, using fetch:
            /*
            fetch('register_class.php', {
                method: 'POST',
                body: new FormData(document.getElementById('registerForm'))
            }).then(response => response.text()).then(data => {
                console.log(data);
            }).catch(error => {
                console.error('Error:', error);
            });
            */

            return false; // Prevent the default form submission
        }
    </script>
</body>
</html>
