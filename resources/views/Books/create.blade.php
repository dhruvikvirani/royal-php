@extends('Layout.header')
@section('content')
<div class="row justify-content-center">
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert" style="width: 50rem;">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger" role="alert" style="width: 50rem;">
        {{ session()->get('error') }}
    </div>
    @endif
    <div class="card" style="width: 50rem;">
        <div class="card-header">
            <b>Add New Books</b>
        </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Title">
                        @error('title') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" name="isbn" id="isbn" value="{{old('isbn')}}" placeholder="ISBN">
                        @error('isbn') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="format">Format</label>
                        <input type="text" class="form-control" id="format" value="{{old('format')}}" name="format" placeholder="Format">
                        @error('format') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="no_of_pages">No Of Pages</label>
                        <input type="number" class="form-control" name="no_of_pages" value="{{old('no_of_pages')}}" id="no_of_pages" placeholder="No Of Pages">
                        @error('no_of_pages') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="release_date">Release Date</label>
                        <input type="date" class="form-control" placeholder="Select Date" value="{{old('release_date')}}" id="release_date" name="release_date">
                        @error('release_date') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="author">Author</label>
                        <select id="author" name="author" value="{{ old('author') }}" class="form-control">
                            <option value="" selected>Select Author</option>
                            @foreach($authors['items'] as $author)
                                <option value="{{$author['id']}}"> {{ $author['first_name'], $author['last_name'] }}</option>
                            @endforeach
                        </select>
                        @error('author') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="description">Description</label>
                        <textarea rows="2" class="form-control" id="description" name="description"  placeholder="Description">
                            {{ old('description') }}
                        </textarea>
                        @error('description') <span class="text-danger"> {{ $message }} </span> @enderror
                    </div>
                    <div class="form-group col-sm-12 p-3">
                        <button type="submit" class="btn btn-primary w-100"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection