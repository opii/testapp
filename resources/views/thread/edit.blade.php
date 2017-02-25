<html>
<head>
    <title>Edit Thread</title>
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

    <h1>Edit {{ $thread->title }}</h1>

    <!-- if there are creation errors, they will show here -->

    {!! Form::model($thread, array('route' => array('threads.update', $thread->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Edit the Thread', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

</div>
</body>
</html>