@extends('layouts.main')
    @section('content')
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
    @endsection


