<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookies - Books</title>
</head>
<body>
    <h1>Welcome to Bookies - Books</h1>

    <h2>Books List</h2>

    @foreach($books as $book)
        <ul>
            <li><strong>Title: </strong>{{ $book['title'] }}</li>
            <li><strong>Published Year: </strong>{{ $book['year'] }}</li>
            <li><strong>Description: </strong>{{ $book['description'] }}</li>
            <li><strong>Author: </strong>{{ $authors[$book['author_id']]['name'] ?? 'Unknown Author' }}</li>
            <li><strong>Genre: </strong>{{ $genres[$book['genre_id']]['name'] ?? 'Unknown Genre' }}</li>
            <li><strong>Price: </strong>Rp {{ number_format($book['price'], 0, ',', '.') }}</li>
            <li><strong>Stock: </strong>{{ $book['stock'] }}</li>
        </ul>
    @endforeach
</body>
</html>