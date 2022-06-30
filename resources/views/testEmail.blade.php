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
    @if($details['linkP'] != null)
    <p>Dan juga jika berkenan tolong memberikan link untuk pimpinan perusahaan atau pemimpin tim dibawah</p>
    <a href="{{ $details['linkP'] }}">Link Pimpinan</a>
    @endif
   
    <p>Thank you</p>
</body>
</html>