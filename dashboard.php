<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virtual Study Groups and Social Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                        url('https://marvel-b1-cdn.bc0a.com/f00000000100045/www.elmhurst.edu/wp-content/uploads/2020/10/virtual-learning-illustration.jpg') center/cover no-repeat fixed;
            min-height: 100vh;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 40px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
        }

        .header h1 {
            font-size: 24px;
            color: #1a237e;
            font-weight: 600;
            line-height: 1.3;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #1a237e;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
        }

        .logout-btn {
            background: #f50057;
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #c51162;
            transform: translateY(-2px);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.2);
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 20px;
            height: 80px;
            width: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e3f2fd;
            color: #1a237e;
        }

        .feature-title {
            font-size: 35px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #1a237e;
        }

        .feature-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .container {
                margin: 15px auto;
                padding: 10px;
            }

            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 20px;
            }

            .header h1 {
                font-size: 20px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Virtual Study Groups and Social Learning Platform</h1>
            <div class="user-profile">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <a href="login.html" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <div class="features-grid">
            <div class="feature-card" onclick="location.href='direct_messanging.php'">
                <div class="feature-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="feature-title">Direct Messaging</h3>
                <p class="feature-description">Connect with peers and mentors through our real-time messaging system</p>
            </div>

            <div class="feature-card" onclick="location.href='interactive_classes.php'">
                <div class="feature-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="feature-title">Interactive Classes</h3>
                <p class="feature-description">Join live workshops and classes with interactive learning experiences</p>
            </div>

            <div class="feature-card" onclick="location.href='social_intergration.php'">
                <div class="feature-icon">
                    <i class="fas fa-share-alt"></i>
                </div>
                <h3 class="feature-title">Social Integration</h3>
                <p class="feature-description">Share your achievements and connect with your social networks</p>
            </div>

            <div class="feature-card" onclick="location.href='collaborative_tools.php'">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Collaborative Tools</h3>
                <p class="feature-description">Work together with powerful collaboration features and shared workspaces</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="feature-title">Gamified Learning</h3>
                <p class="feature-description">Learn while having fun with points, badges, and achievements</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users-class"></i>
                </div>
                <h3 class="feature-title">Study Groups</h3>
                <p class="feature-description">Join or create virtual study groups to learn together with peers</p>
            </div>
        </div>
    </div>
</body>
</html>