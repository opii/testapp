<!DOCTYPE html>
<html>
<head>
    <title>Create New Thread</title>
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

    <h1>Create a Threac</h1>

    <!-- if there are creation errors, they will show here -->

    {!!  Form::open(array('url' => 'threads')) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title','', array('class' => 'form-control')) !!}
    </div>


    {!! Form::submit('Create the Thread!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

</div>
</body>
</html>