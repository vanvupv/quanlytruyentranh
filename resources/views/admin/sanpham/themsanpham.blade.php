@extends('admin.main')
@section('content')

    <div class="app-ecommerce">
        @include('share.error')
        @if($action == 'create')
        <form action="{{route('sanpham.store')}}" method="POST">
        @else
        <form action="{{route('sanpham.postedit',['id' => $sanpham->id])}}" method="POST">
        @endif
            @csrf
        <!-- Add Product -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3 gap-4 gap-md-0">
            <div class="d-flex flex-column justify-content-center">
                @if($action == 'create')
                    <h4 class="mb-1">Add a new Product</h4>
                    <p class="mb-0">Orders placed across your store</p>
                @else
                    <h4 class="mb-1">Edit Product</h4>
                    <p class="mb-0">Orders placed across your store</p>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- First column-->
            <div class="col-12 col-lg-8">
                <!-- Product Information -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-tile mb-0">Product information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product name"
                                   name="productTitle" aria-label="Product name" value="@if($action == 'edit') {{$sanpham->tensanpham}} @endif">
                            <label for="ecommerce-product-name">Name</label>
                        </div>

                        <div class="row gx-5 mb-3">
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="ecommerce-product-sku" placeholder="00000"
                                           name="productSku" aria-label="Product SKU" value="@if($action == 'edit') {{$sanpham->sku}} @endif">
                                    <label for="ecommerce-product-sku">SKU</label>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-5 mb-3">
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input type="text" class="form-control" id="ecommerce-product-unit" placeholder="Đơn vị tính"
                                           name="productUnit" aria-label="Product Unit" value="@if($action == 'edit') {{$sanpham->donvitinh}} @endif">
                                    <label for="ecommerce-product-unit">Unit</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-floating form-floating-outline">
                                    <input type="number" class="form-control" id="ecommerce-product-quantity"
                                           placeholder="qty" name="productQty" aria-label="Product quantity" @if($action == 'edit') value={{$sanpham->soluong}} @endif>
                                    <label for="ecommerce-product-quantity"> Quantity </label>
                                </div>
                            </div>
                        </div>
                        <!-- Comment -->
                        <div>
                            <label class="mb-1">Description (Optional)</label>
                            <div class="form-group">
                                <textarea name="productDesc" id="ecommerce-product-description" rows="10" cols="80">
                                    @if($action == 'edit') {{$sanpham->mota}} @endif
                                </textarea>
                                <script>
                                    CKEDITOR.replace( 'ecommerce-product-description' );
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Information -->
            </div>
            <!-- /Second column -->

            <!-- Second column -->
            <div class="col-12 col-lg-4">
                <!-- Pricing Card -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pricing</h5>
                    </div>
                    <div class="card-body">
                        <!-- Base Price -->
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control wc_input_price" id="_sale_price" placeholder="Price"
                                   name="productPrice" aria-label="Product price" @if($action == 'edit') value={{trim($sanpham->giaban)}} @endif>
                            <label for="ecommerce-product-price">Best Price</label>
                        </div>

                        <!-- Discounted Price -->
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="text" class="form-control wc_input_price" id="_regular_price"
                                   placeholder="Discounted Price" name="productDiscountedPrice"
                                   aria-label="Product discounted price" @if($action == 'edit') value={{$sanpham->gianhap}} @endif>
                            <label for="ecommerce-product-discount-price">Discounted Price</label>
                        </div>
                    </div>
                </div>
                <!-- /Pricing Card -->
                <!-- Organize Card -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Organize</h5>
                    </div>
                    <div class="card-body">
                        <!-- Category -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <div class="w-100 me-4">
                                <select id="category-org" name="matheloai" class="form-select form-select-sm"
                                        data-placeholder="Chọn Thể loại">
                                    <option value="">Chọn Thể loại</option>
                                   @if($theloais)
                                       @foreach($theloais as $id => $item)
                                            <option @if($action == 'edit' && $sanpham->matheloai == $id) selected @endif value="{{$id}}">{{$item}}</option>
                                       @endforeach
                                   @endif
                                </select>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3 col ecommerce-select2-dropdown">
                            <select id="status-org" name="status" class="form-select form-select-sm" data-placeholder="Select Status">
                                <option value="">Select Status</option>
                                <option @if($action == 'edit' && $sanpham->trangthai == 'Published') selected @endif value="Published">Published</option>
                                <option @if($action == 'edit' && $sanpham->trangthai == 'Scheduled') selected @endif value="Scheduled">Scheduled</option>
                                <option @if($action == 'edit' && $sanpham->trangthai == 'Inactive') selected @endif value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /Organize Card -->
                <!-- Media -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 card-title">Product Image</h5>
                        <a href="javascript:void(0);" class="fw-medium" id="lfm" data-input="thumbnail" data-type="image" data-preview="holder">Add media from URL</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-3">
                            <div id="holder">
                                <img src="{{ isset($sanpham) ? asset($sanpham->anhbia) : '' }}" alt="">
                            </div>
                        </div>
                        <input id="thumbnail" class="form-control" type="hidden" name="anhbia" @if($action == 'edit') value={{$sanpham->anhbia}} @endif>
                    </div>
                </div>
                <!-- /Media -->
            </div>
            <!-- /Second column -->
        </div>
            <input type="submit" value="Create Product" class="btn btn-warning">
        </form>
    </div>
@endsection

