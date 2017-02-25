<!DOCTYPE html>
<html>
<head>
    <title>Create New Comment</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <h1>Write Comment for Thread : {{$thread->title}}</h1>

    <!-- if there are creation errors, they will show here -->

    {!!  Form::open(array('url' => 'comments/store')) !!}

    <div class="form-group">
        {!! Form::label('text', 'Text') !!}
        {!! Form::text('text','', array('class' => 'form-control')) !!}
    </div>
    {!! Form::hidden('threadid',$thread->id, []) !!}
    @if(!empty($parent))
        {!! Form::hidden('parentid',$parent, []) !!}
    @endif

    {!! Form::submit('Save Comment!', array('class' => 'btn btn-primary')) !!}

    {!! Form::close() !!}

</div>
</body>
</html>