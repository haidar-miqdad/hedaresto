@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Advanced Forms</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>

                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        
                        <div class="card">
                            <div class="card-header">
                                <h4>Input Text</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" 
                                    value="{{ $product->name }}"
                                    name="name"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number"
                                        name="stock"
                                        value="{{ $product->stock }}"
                                        class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number"
                                        name="price"
                                        value="{{ $product->price }}"
                                        class="form-control">
                                    
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input type="text"
                                        name="description"
                                        value="{{ $product->description }}"
                                        class="form-control">
                                    
                                </div>
                               
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <div class="selectgroup w-100">
                                        
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="food"
                                                @if ($product->category == 'food')
                                                    checked
                                                    
                                                @endif
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Food</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="drink"
                                                @if ($product->category == 'drink')
                                                    checked
                                                    
                                                @endif
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Drink</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="category"
                                                value="snack"
                                                @if ($product->category == 'snack')
                                                    checked
                                                    
                                                @endif
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Snack</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                    </div>
                </form>
                    


                    
                
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
