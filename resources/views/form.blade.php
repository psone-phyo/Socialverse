<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('form') }}" method="POST">
        @csrf
        <input type="text" name="message" id="message" placeholder="Enter your message">
        <button type="submit">Send</button>
    </form>
</body>
</html>
