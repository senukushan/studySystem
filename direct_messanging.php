<?php
session_start();
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
    <title>Direct Messaging - Virtual Study Groups Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color:rgb(108, 169, 238);
            --secondary-color:rgb(59, 167, 175);
            --background-color: #f8fafc;
            --border-color: #e2e8f0;
            --message-sent: #2563eb;
            --message-received: #f1f5f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--background-color);
            height: 100vh;
            overflow: hidden;
        }

        .container {
            display: grid;
            grid-template-columns: 300px 1fr;
            height: 100vh;
            background: white;
        }

        /* Sidebar Styles */
        .sidebar {
            background: white;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
        }

        .header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .back-to-dashboard-btn {
            padding: 0.5rem;
            color: var(--primary-color);
            text-decoration: none;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .back-to-dashboard-btn:hover {
            background: var(--background-color);
        }

        .search-container {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .search-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.9rem;
            background: var(--background-color);
        }

        .contacts-list {
            overflow-y: auto;
            flex-grow: 1;
        }

        .contact {
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid var(--border-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .contact:hover {
            background: var(--background-color);
        }

        .contact-avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .contact-info {
            flex-grow: 1;
        }

        .contact-name {
            font-weight: 600;
            color:rgb(14, 16, 29);
        }

        .contact-status {
            font-size: 0.8rem;
            color:rgb(106, 114, 126);
        }

        /* Chat Area Styles */
        .chat-area {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .chat-header {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .chat-messages {
            flex-grow: 1;
            padding: 1.5rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            background: var(--background-color);
        }

        .message {
            max-width: 70%;
            padding: 1rem;
            border-radius: 12px;
            position: relative;
        }

        .message-sent {
            background: var(--message-sent);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .message-received {
            background: var(--message-received);
            color:rgb(18, 69, 102);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
        }

        .message-time {
            font-size: 0.75rem;
            opacity: 0.8;
            margin-top: 0.5rem;
        }

        .chat-input-container {
            padding: 1rem;
            border-top: 1px solid var(--border-color);
            display: flex;
            gap: 1rem;
            align-items: center;
            background: white;
        }

        .chat-input {
            flex-grow: 1;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.95rem;
            resize: none;
        }

        .send-button {
            padding: 0.75rem 1.5rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .send-button:hover {
            background: var(--secondary-color);
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="header">
                <h1>Messages</h1>
                <a href="dashboard.php" class="back-to-dashboard-btn">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Search contacts...">
            </div>
            <div class="contacts-list">
                <div class="contact">
                    <div class="contact-avatar">SK</div>
                    <div class="contact-info">
                        <div class="contact-name">Senura Kushan</div>
                        <div class="contact-status">Online</div>
                    </div>
                </div>
                <div class="contact">
                    <div class="contact-avatar">MD</div>
                    <div class="contact-info">
                        <div class="contact-name">Malani Damayanthi</div>
                        <div class="contact-status">Last seen 2h ago</div>
                    </div>
                </div>
                <div class="contact">
                    <div class="contact-avatar">HK</div>
                    <div class="contact-info">
                        <div class="contact-name">Hiran Kanishka</div>
                        <div class="contact-status">Online</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chat-area">
            <div class="chat-header">
                <div class="contact-avatar">SK</div>
                <div class="contact-info">
                    <div class="contact-name">Senura Kushan</div>
                    <div class="contact-status">Online</div>
                </div>
            </div>
            
            <div class="chat-messages">
                <div class="message message-received">
                    <div class="message-content">Hi! How are you doing with the study materials?</div>
                    <div class="message-time">10:30 AM</div>
                </div>
                
                <div class="message message-sent">
                    <div class="message-content">Hey! I'm going through the calculus problems now. Would you like to join a study session?</div>
                    <div class="message-time">10:32 AM</div>
                </div>
                
                <div class="message message-received">
                    <div class="message-content">Sure! That would be great. When would you like to start?</div>
                    <div class="message-time">10:33 AM</div>
                </div>
            </div>

            <div class="chat-input-container">
                <textarea class="chat-input" placeholder="Type your message..." rows="1"></textarea>
                <button class="send-button">
                    <i class="fas fa-paper-plane"></i> Send
                </button>
            </div>
        </div>
    </div>
</body>
</html>