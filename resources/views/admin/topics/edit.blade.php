@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="h2">edit topic: {{$topic->name}}</div>
        <a href="{{route('topics.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{route('topics.update', $topic->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-5">
                    <label for="name">Name</label>
                    <input type="text" required class="form-control" name="name" value="{{$topic->name}}" >
                </div>
                <div class="form-group col-md-5 mt-3">
                    <label for="subject_id">Select subject</label>
                    <select class="form-select" name="subject_id" id="subject_id">
                        @foreach($subjects as $subject)
                            <option value="{{$subject->id}}"  @if($subject->id == $topic->subject_id) selected @endif > {{$subject->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-5 mt-3 text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
