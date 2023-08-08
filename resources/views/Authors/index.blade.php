@extends('Layout.header')
@section('content')
<div class="row justify-content-center">
  @if(session()->has('success'))
  <div class="alert alert-success" role="alert" style="width: 90rem;">
      {{ session()->get('success') }}
  </div>
  @endif

  @if(session()->has('error'))
    <div class="alert alert-danger" role="alert" style="width: 90rem;">
        {{ session()->get('error') }}
    </div>
  @endif
<div class="card" style="width: 90rem;">
    <div class="card-header">
        <b>Authors</b>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Place Of Birth</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col" style="width:12%;">Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse($authors['items'] as $key => $author)
              <tr>
                <th scope="row">{{$key + 1}}</th>
                <td> {{ $author['id'] }} </td>
                <td> {{ $author['first_name'] }} </td>
                <td> {{ $author['last_name'] }} </td>
                <td> {{ $author['gender'] }} </td>
                <td> {{ $author['place_of_birth'] }} </td>
                <td> {{ date('Y-m-d',strtotime($author['birthday'])) }} </td>
                <td class="d-flex">
                  <a  href="{{ route('authors.show', $author['id']) }}" class="btn btn-info btn-sm" style="margin-right: 5px;"> View </a>
                  <form action="{{ route('authors.destroy', $author['id']) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete">Delete</button>
                  </form>
                </td>
              </tr>
            @empty
                <tr>
                    <th scope="row"> No records available.</th>
                </tr>
            @endforelse
            </tbody>
        </table>
        <nav aria-label="Page navigation" style="display: flex;justify-content: center;">
          <ul class="pagination">
            <li class="page-item {{$authors['current_page'] == 1 ? 'disabled' : ''}}">
              <a class="page-link" href="{{ route('authors.index',['page' => $authors['current_page'] - 1])  }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            @for ($i=($authors['current_page']>=5?$authors['current_page']:1);$i<=($authors['total_pages']>5?5:$authors['total_pages']);$i++)
              <li class="page-item {{ $authors['current_page'] == $i ?'active':''}}"><a class="page-link" href="{{ route('authors.index',['page' => $i])  }}">{{$i}}</a></li>
            @endfor
            <li class="page-item {{$authors['current_page'] == $authors['total_pages'] ? 'disabled' : ''}}">
              <a class="page-link" href="{{ route('authors.index',['page' => $authors['current_page'] + 1])  }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    </div>
</div>
</div>
@endsection