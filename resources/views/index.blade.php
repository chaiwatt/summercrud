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
    <div class="container">
        <div class="flex-center position-ref full-height">
            <main role="main">
                <form method ="" action="{{route('create')}}">
                    @csrf
                    <button type="submit" class="btn btn-primary">เพิ่มรายการบทความ</button>
                </form>
            </main>
         </div>
    </div>
    
    <body class="container">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="testtopictable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>รายการบทความ</th>                               
                            <th style="width:150px">เพิ่มเติม</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($summernotes as $key => $summernote)
                        <tr>    
                            <td> {{$key+1}} </td>
                            <td> {!!$summernote->content!!} </td>                                        
                            <td> 
                                <a href="{{route('edit',['id' => $summernote->id])}}" class="btn btn-primary">แก้ไข</a>
                                <a href="{{route('delete',['id' => $summernote->id])}}"  class="btn btn-danger">ลบ</a>                                      
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>      
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
