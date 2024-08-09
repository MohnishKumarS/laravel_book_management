@extends('layouts.admin')

@section('content')
    <section class="page-allbooks">
        <h2 class="sec-title">All Books</h2>

        <div class="page-block">
            @if ($booksAll->count())
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Genre</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($booksAll as $val)
                                <tr class="align-middle">
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>
                                        <div>
                                            <img src="{{ asset('image/books/' . $val->image) }}" alt="{{ $val->title }}"
                                                width="80">
                                        </div>
                                    </td>
                                    <td>{{ $val->title }}</td>
                                    <td>{{ $val->author }}</td>
                                    <td>{{ $val->genre }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('book.edit', $val->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('admin.deleteBook', $val->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                       <!-- Paginate -->
                       <div class="paginate-pro mt-5 text-center">
                        {{ $booksAll->links() }}
                    </div>
                </div>
            @else
                {{-- empty image --}}
                <div class="text-center">
                    <img src="{{ asset('assets/image/no-data.svg') }}" alt="no-data-found" width="700">
                </div>
            @endif
        </div>

        </div>
    </section>
@endsection
