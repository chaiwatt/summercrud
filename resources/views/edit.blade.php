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
    <br>
        <body class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('editsave',['id' => $summernote->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>บทความ<span class="text-danger"></span></label>
                                <textarea name="content" id="summernote" class="summernote" placeholder="บทความ">{{$summernote->content}}</textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn bg-teal">บันทึก <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
            <!-- /striped rows -->
            </div>
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
