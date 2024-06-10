<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat con {{ $user }} - Uforum</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .chat-box {
            max-height: 500px;
            overflow-y: auto;
            padding: 20px;
        }
        .message {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .message.sender {
            background-color: #007bff;
            color: #fff;
            text-align: right;
        }
        .message.receiver {
            background-color: #f1f1f1;
            color: #333;
            text-align: left;
        }
        .message img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chat con {{ $user }}</h1>
        <div class="chat-box">
            @foreach ($messages as $message)
                <div class="message {{ $message['type'] }}">
                    <strong>{{ $message['user'] }}:</strong>
                    @if (isset($message['text']))
                        <p>{{ $message['text'] }}</p>
                    @endif
                    @if (isset($message['image']))
                        <img src="{{ asset('storage/' . $message['image']) }}" alt="Imagen">
                    @endif
                </div>
            @endforeach
        </div>
        <form action="{{ route('chat.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user" value="{{ $user }}">
            <div class="form-group">
                <textarea name="message" class="form-control" rows="2" placeholder="Escribe tu mensaje..."></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>
</html>
