@extends('layouts.main')
    @section('content')
        <h1 align ="center">Summernote Laravel</h1>
        <div class="flex-center position-ref full-height">
            <main role="main">
                <form method ="POST" action="{{route('createsave')}}">
                    @csrf
                    <textarea name="content" class="summernote"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </main>
        </div>
    @endsection
