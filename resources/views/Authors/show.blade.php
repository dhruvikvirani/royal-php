@extends('Layout.header')
@section('content')
<div class="row justify-content-center">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="width: 50rem;">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="card" style="width: 50rem;">
        <div class="card-header">
            <b>Author Details</b>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-evenly">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>First Name: </b>{{$author['first_name']}}</li>
                <li class="list-group-item"><b>Last Name: </b>{{$author['last_name']}}</li>
                <li class="list-group-item"><b>Biography: </b>{{$author['biography'] ?? ''}}</li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Gender: </b>{{$author['gender']}}</li>
                <li class="list-group-item"><b>Birth Date: </b>{{date('Y-m-d',strtotime($author['birthday']))}}</li>
                <li class="list-group-item"><b>Place of Birth: </b>{{$author['place_of_birth']}}</li>
            </ul>
            </div>
            <hr/>
            <div>
                <h5>Books</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Format</th>
                        <th scope="col">No. of Pages</th>
                        <th scope="col">Release Date</th>
                        <th scope="col" style="width:12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($author['books'] as $key => $book)
                      <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td> {{ $book['id'] }} </td>
                        <td> {{ $book['title'] }} </td>
                        <td> {{ $book['description'] }} </td>
                        <td> {{ $book['isbn'] }} </td>
                        <td> {{ $book['format'] }} </td>
                        <td> {{ $book['number_of_pages'] }} </td>
                        <td> {{ date('Y-m-d',strtotime($book['release_date'])) }} </td>
                        <td>
                            <form action="{{ route('books.destroy', $book['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                            </form>
                        </td>
                      </tr>
                    @empty
                        <tr>
                            <th colspan="9" scope="row"> No Books available.</th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection