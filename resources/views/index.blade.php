@extends('layouts.main')


@section('content')
    <div class="home-page">
        <div class="container">

            <div class="text-end mb-4  ">
                <a class="btn btn-success" href="{{ url('create-book') }}" data-mdb-ripple-init>Create New <i
                        class="fa-solid fa-plus ps-1"></i></a>
            </div>


            <h2 class="sec-title">All books</h2>

            <div class="all-books">
                @if ($books->count())
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                        @foreach ($books as $val)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ asset('image/books/' . $val->image) }}" class="card-img-top" alt="book-title"
                                        height="250" style="object-fit: contain" />
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-3">{{ $val->title }}</h5>
                                        <p class="card-text">Author : <span>{{ $val->author }}</span></p>
                                        <p class="card-text">Genre : <span>{{ $val->genre }}</span></p>
                                        <p class="card-text">ISBN : <span>{{ $val->isbn }}</span></p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <div>
                                            <small class="text-muted">Published Year : <span
                                                    class="text-danger">{{ $val->publication_year }}</span></small>
                                        </div>
                                        <div>
                                            @auth
                                                @if (auth()->id() == $val->user_id)
                                                    <a href="{{ route('book.edit', $val->id) }}">Edit <i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                @endif
                                            @endauth

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- Paginate -->
                    <div class="paginate-pro mt-5 text-center">
                        {{ $books->links() }}
                    </div>
                @else
                    <div class="text-center">
                        <img src="{{asset('assets/image/no-data.svg')}}" alt="no-data-found" width="500">
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
