@extends('layouts.app')

@section('content')

        <div class="d-flex justify-content-between">
            <div class="h2">Subjects</div>
            <a href="{{route('subject.create')}}" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </div>
        <div>
            <table class="table mt-4">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <th scope="row">{{$subject->id}}</th>
                        <td><img src="{{$subject->image}}" width="50" alt=""></td>
                        <td>{{$subject->name}}</td>
                        <td>{{$subject->description}}</td>
                        <td>{{$subject->created_at}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-warning" href="{{route('subject.edit', $subject->id)}}"><i class="fa fa-edit"></i></a>
                                <form method="post" action="{{route('subject.delete', $subject->id)}}" >
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
