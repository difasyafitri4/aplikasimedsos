@extends('template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Input</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('feed.index') }}">Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Input gagal.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('feed.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="video" class="form-label">Video</label>
                    <input type="file" name="video" class="form-control" id="video">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="caption" class="form-label">Caption</label>
                    <input type="text" name="caption" class="form-control" id="caption" placeholder="Caption">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </div>
        </div>
    </form>
</body>
</html>
@endsection
