<!DOCTYPE html>
<html>
<head>
    <title>Show Thread</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('threads') }}">View All Threads</a></li>
            <li><a href="{{ URL::to('threads/create') }}">Create a Threads</a>
        </ul>
    </nav>

    <h1>Showing {{ $thread->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $thread->title }}</h2>
        <p>
            <strong>Title:</strong> {{ $thread->title }}<br>
        </p>

        @foreach ($comments as $comment)
            <p>Comment:  {{ $comment->text }}</p>
        @endforeach


    </div>

</div>
</body>
</html>