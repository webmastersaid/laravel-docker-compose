<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul {
            display: flex;
        }
        li {
            list-style: none;
            margin: 10px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{route('book.index')}}">Books</a></li>
            <li><a href="{{route('post.index')}}">Posts</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>