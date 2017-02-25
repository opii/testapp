<!DOCTYPE html>
<html>
<head>
    <title>Threads</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('threads') }}">View All Threads</a></li>
            <li><a href="{{ URL::to('threads/create') }}">Create a Thread</a>
        </ul>
    </nav>

    <h1>All the Threads</h1>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($threads as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->title }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('threads/' . $value->id) }}">Show this Thread</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('threads/' . $value->id . '/edit') }}">Edit this Thread</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('comments/create/' . $value->id ) }}">Create comment for this Thread</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</body>
</html>
