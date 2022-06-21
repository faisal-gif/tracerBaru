<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h3>{{$details['nama']}}
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>untuk pengisian diharuskan mengisikan email yang ada di sistem </p>
    <p>email anda yang sudah terdaftar di sistem : {{ $details['email'] }}</p>
    <a href="{{ $details['link'] }}">Link Alumni</a>
   
    <p>Thank you</p>
</body>
</html>