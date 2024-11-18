<!DOCTYPE html>
<html lang="en">

<head>
    <title>Answer</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        /* Main content and container styles */
        .main-content {
            padding: 30px;
            background-color: #f7f9fa;
            width: 60%;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Arial', sans-serif;
        }

        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form group styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            font-size: 1rem;
            color: #34495e;
        }

        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 6px;
            font-size: 1rem;
            height: 150px;
            resize: vertical;
            background-color: #fff;
        }

        /* Button styles */
        .submit-btn, .submit-btn-cancel {
            background-color: #36806c;
            color: white;
            border: none;
            padding: 12px 25px;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
            display: inline-block;
            margin-right: 10px;
        }

        .submit-btn:hover {
            background-color: #29b93c;
        }

        .submit-btn-cancel {
            background-color: #c2260b;
            margin-top: 10px;
        }

        .submit-btn-cancel:hover {
            background-color: #e74c3c;
        }

        /* Alert styles */
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
    </style>
</head>

<body>
    <div class="main-content">
        <h2>Savol: {{ $application->subject }}</h2>

        {{-- Xabarlar --}}
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

        <form action="{{ route('answers.store', ['application' => $application->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="body">Javob yozish:</label>
                <textarea id="body" name="body" placeholder="Enter your message" required></textarea>
            </div>
            <div>
                <button type="submit" class="submit-btn">Yuborish</button>
                <a href="{{ route('manager') }}" class="submit-btn-cancel">Bekor qilish</a>
            </div>
        </form>
    </div>
</body>

</html>
