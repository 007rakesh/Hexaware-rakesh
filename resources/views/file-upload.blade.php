<!DOCTYPE html>
<html>
<head>
    <title>Laravel File Storage with Amazon S3 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="panel panel-primary">
      <div class="panel-heading"><h2>Laravel File Storage with Amazon S3 </h2></div>
      <div class="panel-body">

        @if (Session::get('message'))
        <div class="alert alert-success alert-block">
                <strong>{{Session::get('message')}}</strong>
        </div>
        @endif

        <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <input type="file" name="file" class="form-control">
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>

      </div>
    </div>
</div>
</body>

</html>