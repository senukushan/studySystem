<!DOCTYPE html>
<html>
<head>
    <title>Collaborative Tools - Virtual Study Groups Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #3949ab;
            --accent-color: #7986cb;
            --hover-color: #e8eaf6;
            --background-color: #f4f4f9;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
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

        .tools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .tool-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .tool-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-color);
        }

        .tool-icon {
            font-size: 2.5em;
            color: var(--accent-color);
            margin-bottom: 15px;
        }

        .tool-name {
            font-size: 20px;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: bold;
        }

        .tool-description {
            color: #666;
            margin-bottom: 20px;
            font-size: 0.9em;
        }

        .tool-action {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .tool-action:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .tool-action i {
            margin-left: 8px;
        }

        .tool-status {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8em;
            background-color: #e8f5e9;
            color: #2e7d32;
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

            .tools-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-tools"></i> Collaborative Tools</h1>
            <a href="dashboard.php" class="back-to-dashboard-btn">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <div class="tools-grid">
            <div class="tool-card">
                <div class="tool-status">Live</div>
                <div class="tool-icon">
                    <i class="fas fa-chalkboard"></i>
                </div>
                <div class="tool-name">Shared Whiteboard</div>
                <div class="tool-description">
                    Collaborate in real-time with your study group using our interactive whiteboard. Draw, write, and explain concepts visually.
                </div>
                <a href="https://witeboard.com/6e746740-c5f0-11ef-a567-bbf75cb818dc" class="tool-action" target="_blank">
                    Shared Whiteboard <i class="fas fa-chalkboard"></i>
                </a>
            </div>

            <div class="tool-card">
                <div class="tool-status">Active</div>
                <div class="tool-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <div class="tool-name">Group Chat</div>
                <div class="tool-description">
                    Connect with your study partners through instant messaging. Share ideas, ask questions, and coordinate study sessions.
                </div>
                <a href="#" class="tool-action">
                    Join Chat <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="tool-card">
                <div class="tool-status">Available</div>
                <div class="tool-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="tool-name">Document Collaboration</div>
                <div class="tool-description">
                    Work together on study materials, notes, and assignments. Edit documents simultaneously with real-time updates.
                </div>
                <a href="#" class="tool-action">
                    Start Editing <i class="fas fa-edit"></i>
                </a>
            </div>

            <div class="tool-card">
                <div class="tool-status">New</div>
                <div class="tool-icon">
                    <i class="fas fa-video"></i>
                </div>
                <div class="tool-name">Video Conferencing</div>
                <div class="tool-description">
                    Host or join virtual study sessions with video, audio, and screen sharing capabilities.
                </div>
                <a href="#" class="tool-action">
                    Start Meeting <i class="fas fa-video"></i>
                </a>
            </div>
        </div>
    </div>
</body>
</html>