@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <form action="{{ route('user.index') }}">
                <div class="section-header">
                    <h1>Posts</h1>
                    <div class="section-header-button">
                        <a href="{{ route('user.create') }}"
                            class="btn btn-primary">Add User</a>
                    </div>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">User</a></div>
                        <div class="breadcrumb-item">All User</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">User</h2>
                    <p class="section-lead">
                        You can manage all User, such as editing, deleting and more.
                    </p>
    
                    
                    <div class="row mt-4">
                        <div class="col-12">
                            @include('layouts.alert')
                            <div class="card">
                                <div class="card-header">
                                    <h4>All Posts</h4>
                                </div>
                                <div class="card-body">
                                    <div class="float-left">
                                        <select class="form-control selectric">
                                            <option>Action For Selected</option>
                                            <option>Move to Draft</option>
                                            <option>Move to Pending</option>
                                            <option>Delete Pemanently</option>
                                        </select>
                                    </div>
                                    <div class="float-right">
                                        <form action="{{ route('user.index') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text"
                                                name="name"
                                                    class="form-control"
                                                    placeholder="Search">
                                                <div class="input-group-append" >
                                                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
    
                                    <div class="clearfix mb-3"></div>
    
                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                            </tr>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>
                                                    {{ $user->roles }}
                                                </td>
                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    {{-- button edit and delete --}}
                                                    <div class="row">
                                                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info mr-2">Edit<i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete<i class="fas fa-trash"></i></button>
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </table>
                                    </div>
                                    <div class="float-right">
                                        <nav>
                                           {{ $users->links() }}
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
