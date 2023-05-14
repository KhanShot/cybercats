@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-between">
        <div class="h2">Topics</div>
        <a href="{{route('topics.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
    </div>
    <div>
        <table class="table mt-4">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topics as $topic)
                <tr>
                    <th scope="row">{{$topic->id}}</th>
                    <td>{{$topic->name}}</td>
                    <td>{{$topic->subject->name ?? ''}}</td>
                    <td>{{$topic->created_at}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-warning" href="{{route('topics.edit', $topic->id)}}"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{route('topics.delete', $topic->id)}}" >
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
