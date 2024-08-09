@extends('layouts.main')


@section('content')
    <div class="page-book-create">
        <div class="container">

            <h2 class="sec-title">Create new book</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="title" value="{{old('title')}}"/>
                            <label class="form-label">Title</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="author"  value="{{old('author')}}"/>
                            <label class="form-label">Author</label>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" />
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="genre" value="{{old('genre')}}"/>
                            <label class="form-label">Genre <small>(ex:Fantasy, Adventure, Fiction)</small></label>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="year"  value="{{old('year')}}"/>
                            <label class="form-label">Publish Year <small>(ex:1998)</small></label>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="isbn"  value="{{old('isbn')}}"/>
                            <label class="form-label">ISBN <small>(ex:978-0451524935)</small></label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-main" type="submit">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
