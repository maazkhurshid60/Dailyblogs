<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>

    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Navbar</a>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>



    <div class="container mt-5">
        <h2 class="mb-4">Add New Blog Post</h2>
        <form action="{{route('blogs.save')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('post')
            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title"
                    required>
            </div>

            <!--Author-->
            <div class="mb-3">
                <label for="author" class="form-label">Blog Author</label>
                <input type="text" class="form-control" id="author" name="author"
                    placeholder="Author Name " required></input>
            </div>
            <!-- Description -->
            <div class="mb-3">
                <label for="desc" class="form-label">Blog Description</label>
                <textarea class="form-control" id="description" name="desc" rows="5"
                    placeholder="Write your blog content here..." required></textarea>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Publish Blog</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
</script>

</html>
