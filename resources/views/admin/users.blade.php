@extends('layouts.admin')

@section('content')
    <section class="page-allusers">
        <h2 class="sec-title">Users List</h2>

        <div class="page-block">
            @if ($usersAll->count())
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Publish Book</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($usersAll as $val)
                                <tr class="align-middle">
                                    <th scope="row">{{ $i++ }}</th>
       
                                    <td class="text-capitalize fw-bold">{{ $val->name }}</td>
                                    <td>{{ $val->email }}</td>
                                    <td>{{ $val->role }}</td>
                                    <td>{{ count($val->books)}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                       <!-- Paginate -->
                       <div class="paginate-pro mt-5 text-center">
                        {{ $usersAll->links() }}
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
