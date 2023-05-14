@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="h2">edit subject: {{$subject->name}}</div>
        <a href="{{route('subject.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{route('subject.update', $subject->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-5">
                    <label for="name">Name</label>
                    <input type="text" required class="form-control" name="name" value="{{$subject->name}}" >
                </div>
                <div class="form-group col-md-5 mt-3">
                    <label for="description">Description</label>
                    <textarea required class="form-control" name="description">{{$subject->description}}</textarea>
                </div>
                <div class="form-group col-md-5 mt-3">
                    <label for="image">Image <a href="{{$subject->image}}" target="_blank">(view old image)</a></label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                </div>

                <div class="form-group col-md-5 mt-3 text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
