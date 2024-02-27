
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import District
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import District</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Blocks
        </div>
        <div class="card-body">
            <form action="{{ route('import-block') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Blocks</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import panchayat
        </div>
        <div class="card-body">
            <form action="{{ route('import-panchayat') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import panchayat</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import village
        </div>
        <div class="card-body">
            <form action="{{ route('import-village') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import village</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import habitation
        </div>
        <div class="card-body">
            <form action="{{ route('import-habitation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import habitation</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import division
        </div>
        <div class="card-body">
            <form action="{{ route('import-division') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import division</button>
            </form>
        </div>
    </div>
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Slssc
        </div>
        <div class="card-body">
            <form action="{{ route('import-slssc') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Slssc</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
