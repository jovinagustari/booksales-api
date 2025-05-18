<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookies - Authors</title>
</head>
<body>
    <h1>Welcome to Bookies - Authors</h1>

    <h2>Author List</h2>
    <ul>
        @foreach($authors as $author)
            <li>{{ $author['name'] }}</li>
            <p>{{ $author['bio'] }}</p>
            <p>Born: {{ $author['birth_year'] }}</p>
            <p>Nationality: {{ $author['nationality'] }}</p>
        @endforeach
    </ul>
</body>
</html>