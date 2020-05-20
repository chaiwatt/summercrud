<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
    </head>
    <body class="text-center">
        <div class="flex-center position-ref full-height">
            <main role="main">
                <div class="content">
                    <div class="title m-b-md">
                        <h1>Summer note </h1>
                    </div>
                    <form action="{{route('createsave')}}" method="POST">
                        @csrf
                            <textarea name="content" class="summernote"></textarea>
                        <br>
                            <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
                <br>
                @foreach ($summernotes->sortByDesc('id') as $summernote)
                <div class="card">
                    <div class="card-body">
                        {!! $summernote->content !!}
                    </div>
                </div>
                  <br>
                @endforeach
            </main>
         </div>
         <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
         <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.summernote').summernote({
                    height: 200
                });
            });
        </script>
    </body>
</html>
