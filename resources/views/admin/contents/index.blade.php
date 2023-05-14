@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between">
        <div class="h2">Contents</div>
        <a href="{{route('content.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
    </div>
    <div>
        <table class="table mt-4">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Subject</th>
                <th scope="col">Topic</th>
                <th scope="col">Text</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($contents as $content)
                <tr>
                    <th scope="row">{{$content->id}}</th>
                    <td>{{$content->subject->name ?? ''}}</td>
                    <td>{{$content->topic->name ?? ''}}</td>
                    <td>{!! $content->content !!}</td>
                    <td>{{$content->created_at}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-warning" href="{{route('content.edit', $content->id)}}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{route('content.delete', $content->id)}}" >
                                @csrf @method('delete')
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@endsection
