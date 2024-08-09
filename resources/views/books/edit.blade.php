@extends('layouts.main')


@section('content')
    <div class="page-book-edit">
        <div class="container">

            <h2 class="sec-title">Edit book</h2>


            <form action="{{ route('book.update',$book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="title" value="{{$book->title}}"/>
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                        </div>
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="author" value="{{$book->author}}"/>
                            <label class="form-label">Author<span class="text-danger">*</span></label>
                        </div>
                        @error('title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-lg-6 mb-5">
                       <div>
                        <div >Old Image <span class="text-danger">*</span></div>
                        <img src="{{asset('image/books/'.$book->image)}}" alt="book" width="100">
                       </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div >Add New Image <span class="text-danger">*</span></div>
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control form-control-lg" id="formFileLg" type="file" name="image" />
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="genre" value="{{$book->genre}}"/>
                            <label class="form-label">Genre <small>(ex:Fantasy, Adventure, Fiction)<span class="text-danger">*</span></small></label>
                        </div>
                        @error('genre')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="year" value="{{$book->publication_year}}"/>
                            <label class="form-label">Publish Year <small>(ex:1998)<span class="text-danger">*</span></small></label>
                        </div>
                        @error('year')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" class="form-control form-control-lg" name="isbn" value="{{$book->isbn}}"/>
                            <label class="form-label">ISBN <small>(ex:978-0451524935)<span class="text-danger">*</span></small></label>
                        </div>
                        @error('isbn')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-12 text-center">
                        <button class="btn btn-main" type="submit">Submit Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
