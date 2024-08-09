@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="error-404 text-center">
        <div>
          <img src="{{asset('assets/image/error-404.svg')}}" alt="404-error" class="img-fluid" height="500" width="1000">
        </div>
        <div class="py-2 text-center">
          <a href="{{url('/')}}" class="btn-main w-25">Go to Home</a>
        </div>
      </div>
    </div>
@endsection