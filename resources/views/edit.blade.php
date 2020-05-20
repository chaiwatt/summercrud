@extends('layouts.main')
    @section('content')
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
    @endsection
