<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .delete-button {
            color: #e10909;
            background: none;
            border: none;
        }

        .edit-button {
            color: #0c09e1;
            background: none;
            border: none;
        }

        .reply-button {
            color: #00ff6a;
            background: none;
            border: none;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .answer-title {
            font-size: 0.75rem;
            font-weight: bold;
            margin-top: 0.5rem;
            color: #4F46E5;
            letter-spacing: -0.015em;
        }

        .noanswer-title {
            font-size: 0.75rem;
            font-weight: bold;
            margin-top: 0.5rem;
            color: #f60f0f;
            letter-spacing: -0.015em;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a:hover {
            text-decoration: underline;
            color: #3498db;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #ecf0f1;
            overflow-y: auto;
        }

        .main-content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #bdc3c7;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .user-info button:hover {
            background-color: #c0392b;
        }

        section {
            margin-top: 20px;
        }

        .hidden {
            display: none;
        }

        /* User message list styles */
        .user-list {
            width: 100%;
            margin-top: 20px;
        }

        .user-card {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            background-color: white;
            padding: 15px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .user-card:hover {
            transform: scale(1.02);
        }

        .user-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            border: 2px solid #011014;
        }

        .user-details {
            flex-grow: 1;
        }

        .user-details h4 {
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .user-details p {
            margin-bottom: 5px;
            color: #7f8c8d;
        }

        .user-details .message-time {
            font-size: 12px;
            color: #95a5a6;
        }

        .user-details .subject {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .user-details .message-content {
            color: #1b4672;
        }

        .action-buttons {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .action-buttons button {
            font-size: 24px;
            /* Ikonning kattaligi */
            background-color: transparent;
            /* color: #3498db; Default color */
            border: none;
            cursor: pointer;
            margin: 0 5px;
            /* Horizontal margin */
            transition: color 0.3s;
            padding: 5px;
            /* Ikon atrofidagi joy */
            border-radius: 5px;
            /* Burchaklarni yumshatish */
        }

        .action-buttons button:hover {
            color: #0e11df;
            /* Darker blue on hover */
            background-color: rgba(0, 0, 0, 0.1);
            /* Hover holatida fon rangi */
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 10px 15px;
            margin: 0 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #2980b9;
        }

        .pagination .active {
            background-color: #2c3e50;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#users"><i class="fas fa-users"></i> Xabarlar</a></li>
                <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Foydalanuvchilar</a></li>
                <li><a href="#settings"><i class="fas fa-cogs"></i> Adminlar</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h2>Dashboard</h2>
                <div class="user-info">
                    <span>Welcome, Admin</span>
                    <button id="logout">Chiqish</button>
                </div>
            </header>

            <section id="dashboard" class="hidden">
                <h3>Overview</h3>
                <p>Here’s a quick overview of your system’s performance.</p>
                <!-- Add more dashboard widgets here -->
            </section>

            <section id="users">
                <h3>Oxirgi Xabarlar</h3>
                <p>Jami xabarlar: <strong>{{ $totalApplications }} ta</strong></p>

                <!-- User messages -->
                <div class="user-list">
                    @foreach ($applications as $application)
                        <div class="user-card">
                            @if ($application->file_url && file_exists(storage_path('app/public/' . $application->file_url)))
                                <a href="{{ asset('storage/' . $application->file_url) }}">
                                    <img src="{{ asset('storage/' . $application->file_url) }}" alt="User Image"
                                        class="user-image">
                                </a>
                            @else
                                <img src="{{ asset('images/default-image.png') }}" alt="Default Image"
                                    class="user-image">
                            @endif
                            <div class="user-details">
                                <h4>{{ $application->user->name }}</h4>
                                <p class="message-time">Sent on {{ $application->updated_at }}</p>
                                <p class="subject">{{ $application->subject }}</p>
                                <p class="message-content">{{ $application->message }}</p>

                                <hr>
                                @if ($application->answer)
                                    <h3 class="answer-title">Answer</h3>
                                    <p>{{ $application->answer->body }}</p>
                                @else
                                    <h3 class="noanswer-title">Hali javob berilmadi</h3>
                                @endif
                            </div>

                            
                            <div class="action-buttons">
                                @if ($application->answer)
                                    <a href="{{ route('answers.edit', ['application' => $application->id]) }}">
                                        <button class="edit-button">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                @endif

                                @if (!$application->answer)
                                    <a href="{{ route('answers.create', ['application' => $application->id]) }}">
                                        <button class="reply-button">
                                            <i class="fas fa-reply"></i>
                                        </button>
                                    </a>
                                @endif

                                
                                <a href="{{ route('applications.destroy',['application'=>$application->id]) }}">
                                    <button class="delete-button">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="pagination">
                    {{ $applications->appends(request()->query())->fragment('users')->links() }}
                </div>
            </section>

            <section id="settings" class="hidden">
                <h3>Settings</h3>
                <p>Adjust your system settings here.</p>
                <!-- Settings content -->
            </section>
        </div>
    </div>

    <script>
        document.querySelectorAll('.sidebar ul li a').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('section').forEach(section => {
                    section.classList.add('hidden');
                });
                const targetId = this.getAttribute('href');
                document.querySelector(targetId).classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
