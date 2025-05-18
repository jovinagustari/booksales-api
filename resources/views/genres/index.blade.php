<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookies - Genres</title>
</head>
<body>
    <h1>Welcome to Bookies - Genres</h1>

    <h2>Genres List</h2>
    <ul>
        @foreach($genres as $genre)
            <li>{{ $genre['name'] }}</li>
            <p>{{ $genre['description'] }}</p>
        @endforeach
    </ul>
</body>
</html>