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
            <form action="{{ route('product.index') }}">
                <div class="section-header">
                    <h1>Posts</h1>
                    <div class="section-header-button">
                        <a href="{{ route('product.create') }}"
                            class="btn btn-primary">Add product</a>
                    </div>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">product</a></div>
                        <div class="breadcrumb-item">All product</div>
                    </div>
                </div>
                <div class="section-body">
                    <h2 class="section-title">product</h2>
                    <p class="section-lead">
                        You can manage all product, such as editing, deleting and more.
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
                                        <form action="{{ route('product.index') }}" method="GET">
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
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Image</th>
                                                <th>Created At</th>
                                                <th>Status</th>
                                            </tr>
                                            @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    {{ $product->price }}
                                                </td>
                                                <td>
                                                    {{ $product->stock }}
                                                </td>
                                                <td>
                                                    @if($product->image)
                                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="" class="w-100 h-100">
                                                    @else
                                                    <span class="badge badge-danger">No Image</span>
                                                @endif                                                </td>
                                                
                                                <td>
                                                    {{ $product->created_at }}
                                                </td>
                                                <td>
                                                    
                                                    <div class="row">
                                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info mr-2">Edit<i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
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
                                           {{ $products->links() }}
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
