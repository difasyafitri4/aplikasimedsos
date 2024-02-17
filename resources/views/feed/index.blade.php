@extends('template')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
        <div class="container">
            <div class="d-flex justify-content-center w-100">
                <button class="btn btn-success me-2" onclick="window.location.href='{{ route('feed.create') }}'">Add</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-center">    
        <h2>Feed</h2>
        @foreach ($feeds as $feed)
            <div class="position-relative d-inline-block">
                <video width="260" height="360" controls class="card-center-top">
                    <source src="{{ asset('/storage/'.$feed->video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <form action="{{ route('feed.destroy', $feed->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                </form>
            </div>
            <p>{{ $feed->caption }}</p>
            <p>{{ $feed->created_at->format('d F Y') }}</p>
            <br>
        @endforeach
        {{ $feeds->links() }}
    </div>
</body>
</html>
@endsection
