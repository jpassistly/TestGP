@extends('layouts.master')

@section('title') @lang('translation.Products') @endsection

@section('content')

{{--     @component('components.breadcrumb')
        @slot('li_1') Vendors @endslot
        @slot('title') Add Vendor @endslot
    @endcomponent
 --}}
    <div class="row">
        <div class="col-xl-10">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">Add product</h4>
                    <form action="{{ url('store_product') }}" method="post" name="product_form" id="product_form" enctype="multipart/form-data">@csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select id="category_id" name="category_id" class="form-select select2">
                                        <option value="">Select the option</option>
                                        @foreach($category_list as $clist)
                                        <option value="{{ $clist['id'] }}" {{ old('category_id') == $clist['id'] ? 'selected' : '' }}>{{ $clist['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <!-- <input type="text" class="form-control" id="name" name="name"> -->
                                    <select id="name" name="name" class="form-select select2">
                                        <option value="">Select the option</option>
                                        @foreach($pro as $clist)
                                        <option value="{{ $clist['id'] }}" {{ old('name') == $clist['id'] ? 'selected' : '' }}>{{ $clist['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <select id="quantity_id" name="quantity_id" class="form-select select2">
                                        <option value="">Select the option</option>
                                        @foreach($quantity_list as $qlist)
                                            <option value="{{ $qlist['id'] }}" {{ old('quantity_id') == $qlist['id'] ? 'selected' : '' }}>{{ $qlist['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('quantity_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Measurement</label>
                                    <select id="measurement_id" name="measurement_id" class="form-select select2">
                                        <option value="">Select the option</option>
                                        @foreach($measurement_list as $mlist)
                                            <option value="{{ $mlist['id'] }}" {{ old('measurement_id') == $mlist['id'] ? 'selected' : '' }}>{{ $mlist['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('measurement_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                    @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Picture</label>
                                    <input type="file" class="form-control" id="pic" name="pic" >
                                    <p>.jpeg,jpg Format only</p>
                                    @error('pic')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">subscription</label>
                                    <select id="formrow-inputState" name="subscription" class="form-select">

                                        <option value="N" {{ old('subscription') == 'N' ? 'selected' : '' }}>No</option>
                                        <option value="Y" {{ old('subscription') == 'Y' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                    @error('subscription')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select id="formrow-inputState" name="status" class="form-select">

                                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-md mt-4">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('script')

<script>
   	$(document).ready(function () {
		$('#ecommerce').addClass('mm-active');
		$('#ecommerce_menu').addClass('mm-show');
		$('#product').addClass('mm-active');
	});

    $(document).ready(function() {
    $.validator.addMethod("jpeg", function(value, element) {
        return this.optional(element) || /\.(jpe?g)$/i.test(value);
    }, "Please select a JPEG image.");

    // $('#product_form').validate({
    //     rules: {
    //         category_id: { required: true },
    //         name: { required: true },
    //         price: { required: true,number:true, },
    //         quantity_id: { required: true },
    //         measurement_id: { required: true },
    //         pic: {
    //             required: true,
    //             jpeg: true,
    //             jpg:true
    //         },
    //         status: { required: true }
    //     },
    //     messages: {
    //         category_id: "Select the option",
    //         name: "Select the option",
    //         price:{
    //             required: "enter price",
    //             number: "enter only numbers."
    //         },
    //         quantity_id:{
    //             required: "Select the option",
    //         },
    //         pic: {
    //             required: "Select picture",
    //             jpeg: "Please select a JPEG image."
    //         },
    //         status: "Select status"
    //     }
    // });
});
</script>

@endsection
