<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Directory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Authors</h2>
    <table class="authors-table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->last_name }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->middle_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Books</h2>
    <table class="books-table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>
            <th>Publish Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                <td>{{ $book->author->first_name }} {{ $book->author->last_name }}</td>
                <td>{{ $book->publish_date }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Add New Author</h2>

    <form method="post" action="{{ route('authors.store') }}">
        @csrf
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name">

        <button type="submit">Add Author</button>

    </form>

    <h2>Add New Book</h2>

    <form method="post" action="{{ route('books.store') }}">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <label for="author_id">Author:</label>
        <select name="author_id" required>
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
            @endforeach
        </select>

        <label for="publish_date">Publish Date:</label>
        <input type="date" name="publish_date" required>

        <button type="submit">Add Book</button>
    </form>

</div>


</body>
</html>
