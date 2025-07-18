<!DOCTYPE html>
<html>
<head>
    <title>Social Integration - Virtual Study Groups Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #3949ab;
            --accent-color: #7986cb;
            --background-color:rgb(169, 171, 172);
            --card-hover:rgb(195, 196, 202);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-color);
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
            color: white;
        }

        .header h1 {
            font-size: 32px;
            margin: 0 0 20px 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .back-to-dashboard-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 24px;
            background-color: white;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .back-to-dashboard-btn i {
            margin-right: 8px;
        }

        .back-to-dashboard-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .integration-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .integration-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .integration-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--accent-color);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .integration-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .integration-card:hover::before {
            transform: scaleX(1);
        }

        .integration-card h3 {
            font-size: 22px;
            color: var(--primary-color);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .integration-card h3 i {
            margin-right: 10px;
            font-size: 24px;
            color: var(--accent-color);
        }

        .integration-card p {
            color: #666;
            margin: 0;
            line-height: 1.6;
        }

        .action-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background-color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .header {
                padding: 15px;
            }

            .header h1 {
                font-size: 24px;
            }

            .integration-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-users"></i> Social Integration Hub</h1>
            <a href="dashboard.php" class="back-to-dashboard-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="integration-grid">
            <div class="integration-card">
                <h3><i class="fas fa-user-friends"></i> Connect with Peers</h3>
                <p>Find and connect with like-minded students, share experiences, and build your academic network. Join our vibrant community of learners!</p>
                <a href="https://www.linkedin.com/school/the-open-university-of-sri-lanka/posts/?feedView=all" class="action-btn">CLick Now</a>

              
            </div>

            <div class="integration-card">
                <h3><i class="fas fa-share-alt"></i> Share Your Progress</h3>
                <p>Showcase your achievements, milestones, and learning journey. Inspire others and get inspired by fellow students' success stories.</p>
                <a href="#" class="action-btn">Share Now</a>
            </div>

            <div class="integration-card">
                <h3><i class="fas fa-users-cog"></i> Join Study Groups</h3>
                <p>Collaborate in focused study groups, participate in group discussions, and enhance your learning through peer interaction.</p>
                <a href="#" class="action-btn">Browse Groups</a>
            </div>

            <div class="integration-card">
                <h3><i class="fas fa-calendar-alt"></i> Virtual Events</h3>
                <p>Participate in online study sessions, workshops, and educational events. Connect with experts and expand your knowledge.</p>
                <a href="#" class="action-btn">View Events</a>
            </div>
        </div>
    </div>
</body>
</html>