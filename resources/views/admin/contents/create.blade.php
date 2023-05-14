@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between">
        <div class="h2">Create content</div>
        <a href="{{route('content.index')}}" class="btn btn-success"><i class="fas fa-arrow-left"></i></a>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{route('content.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex">
                    <div class="form-group col-md-4">
                        <label for="subject_id">Select subject</label>
                        <select class="form-select" name="subject_id" id="subject_id">
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}"> {{$subject->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="subject_id">Select animation</label>
                        <select class="form-select" name="animation" id="animation">
                            <option value="">Without animation</option>
                            <option value="animation_1">Animation 1 (aaa)</option>
                            <option value="animation_2">Animation 2 (bbb)</option>
                            <option value="animation_3">Animation 3 (ccc)</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="topic_id">Select topic</label>
                        <select class="form-select" name="topic_id" id="topic_id">
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}"> {{$topic->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group col-md-11 mt-3 ">
                    <label for="description">Content</label>
                    <textarea required class="form-control" style="height: 400px" name="content" id="content"></textarea>
                </div>

                <div class="form-group col-md-5 mt-3 text-end">
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection
