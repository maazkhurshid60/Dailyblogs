<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <title>Daily Blogs</title>

</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <h1 class="text-center mt-4">Welcome to Daily Blogs</h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6  mb-3 mb-sm-0">
                <h2>Latest Blogs</h2>
            </div>
            <div class="col-sm-6  mb-3 mb-sm-0 d-flex justify-content-end align-items-center">
                <a href="{{ route('blogs.add-blog') }}" class="btn btn-primary">Add New</a>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->author }}</p>
                            <p class="card-text">{{ $blog->desc }}</p>
                            <a href="#" class="btn btn-primary">See More</a>
                            <a href="{{ route('blogs.edit', ['blog' => $blog]) }}" class="btn btn-success">Edit</a>
                            <form action="{{route('blogs.delete', ['blog' => $blog])}}" method="post">
                                 @csrf
                                 @method('delete')
                                <button type="submit" class="btn btn-danger form-control" >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
