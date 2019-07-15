<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activation</title>
</head>
<body>
<div style="margin: 0 auto; max-width: 580px;">
    <p>Welcome, <b>{{ $name }}</b> !</p>
    <p>Click to active your account:</p>
    <a href="{{ url('user/activation', $token)}}">{{ url('user/activation', $token)}}</a>
    <p>Thanks!</p>
</div>
</body>
</html>
