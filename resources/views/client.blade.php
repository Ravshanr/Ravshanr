<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .main-content {
            padding: 20px;
            background-color: #ecf0f1;
            width: 80%;
            margin: 0 auto;
        }

        h2 {
            font-family: 'Arial', sans-serif;
            color: #2c3e50;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fff;
        }

        .submit-btn {
            background-color: #36806c;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #29b93c;
        }

        /* Xabarlar uchun uslublar */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
        }

        .alert-success {
            background-color: #4caf50;
        }

        .alert-error {
            background-color: #f44336;
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
            /* Kichik o'lcham (xs) */
            font-weight: bold;
            /* Qalin yozuv */
            margin-top: 0.5rem;
            /* Yuqoridan bo'shliq */
            color: #4F46E5;
            /* Indigo rang (indigo-600) */
            letter-spacing: -0.015em;
            /* Harflar orasidagi bo'shliq */
        }

        .noanswer-title {
            font-size: 0.75rem;
            /* Kichik o'lcham (xs) */
            font-weight: bold;
            /* Qalin yozuv */
            margin-top: 0.5rem;
            /* Yuqoridan bo'shliq */
            color: #f69d0f;
            /* Indigo rang (indigo-600) */
            letter-spacing: -0.015em;
            /* Harflar orasidagi bo'shliq */
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
            /* Justify content for action buttons */
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
            color: #2c3e50;
        }

        .action-buttons {
            display: flex;
            flex-direction: row;
            /* Horizontal alignment */
            align-items: center;
            /* Center vertically */
        }

        .action-buttons button {
            background-color: transparent;
            color: #3498db;
            /* Default color */
            border: none;
            cursor: pointer;
            margin: 0 5px;
            /* Horizontal margin */
            transition: color 0.3s;
            font-size: 20px;
            /* Icon font size */
        }

        .action-buttons button:hover {
            color: #2980b9;
            /* Darker blue on hover */
        }

        .delete-button {
            color: #e74c3c;
            /* Red color for delete */
        }

        .edit-button {
            color: #3498db;
            /* Blue color for edit */
        }

        .reply-button {
            color: #2ecc71;
            /* Green color for reply */
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
            <h2>Client</h2>
            <ul>
                <li><a href="#search"><i class="fas fa-tachometer-alt"></i> Qidiruv</a></li>
                <li><a href="#applications"><i class="fas fa-tachometer-alt"></i> So`rovlarni ko`rish</a></li>
                <li><a href="#sent_message"><i class="fas fa-users"></i> So`rov yuborish</a></li>
                <li><a href="#settings"><i class="fas fa-cogs"></i> Sozlamalar</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <header>
                <h2></h2>
                <div class="user-info">
                    <span>Xush kelibsiz, {{ $user->name }}</span>
                    {{-- <button id="logout" >Chiqish</button> --}}
                   
                    <a id="logout" href="{{ route('logout') }}">Logout</a>

                    {{-- <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        @method('POST')
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                     --}}


                </div> 
            </header>

            <section id="search" class="hidden">
                tuzatilish ishlari olib borilmoqda
                {{-- <h2>Qidiruv natijalari: "{{ $searchTerm }}"</h2>

                @if ($applications->isEmpty())
                    <p>Hech narsa topilmadi.</p>
                @else
                    <div class="user-list">
                        @foreach ($applications as $application)
                            <div class="user-card">
                                <h4>{{ $application->user->name }}</h4>
                                <p class="subject">{{ $application->subject }}</p>
                                <p class="message-content">{{ $application->message }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{ $applications->links() }} <!-- Paginatsiya linklarini ko'rsatish -->
                @endif --}}

            </section>

            <section id="sent_message" class="hidden">
                <h3>Eslatma:</h3>
                <p>Bir kunda faqat bir marta xabar Yo`llash mumkin!!!</p>

                <div class="main-content">
                    <h2>Xabar yo`llash</h2>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf   
                        <div class="form-group">
                            <label for="name">Mavzu:</label>
                            <input type="text" id="name" name="subject" class="form-control"
                                placeholder="Enter your subject" required>
                        </div>

                        <div class="form-group">
                            <label for="profileImage">Fayl yuklang:</label>
                            <input type="file" id="profileImage" name="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="subject">Xabar yollash:</label>
                            <input type="text" id="subject" name="message" class="form-control-message"
                                placeholder="Enter message" required>
                        </div>

                        <button type="submit" class="submit-btn">yuborish</button>
                    </form>
                </div>
            </section>



{{-- sorovlarni korish  --}}
            <section id="applications">
                <h3>Oxirgi Sorovlar</h3>
                <p>Jami Sorovlar: <strong>{{ count($applications) }} ta</strong></p>

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
                        </div>
                    @endforeach
                </div>

                <!-- Pagination Links -->
                <div class="pagination">
                    {{ $applications->appends(request()->query())->fragment('users')->links() }}
                </div>
            </section>
{{-- sozlamalar --}}
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











