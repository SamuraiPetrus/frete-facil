<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Easy Shipping</title>
</head>
<body>
    <div class="screen">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
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

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif
        
        <h1>Easy Shipping</h1>
        <p>An easy and performatic way to upload shipping adjustment spreadsheets to some database.</p>
        <h2>Stage 1:</h2>
        <p>Upload the desired shipping adjustment CSV through the web application.</p>
        <form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" required name="shipping_csv" id="shipping_csv">
            <input type="submit" value="Upload Image" name="submit">
        </form>

        @if(isset($_GET['show_stage_two']) && (bool) $_GET['show_stage_two'] == true)
            <h2>Stage 2:</h2>
            <p>Go to the <a href="http://localhost:15672" target="__blank">RabbitMQ dashboard</a> to see the current event status.</p>
            <ul>
                <li>Login: guest</li>
                <li>Password: guest</li>
            </ul>
        @endif
    </div>
</body>
</html>