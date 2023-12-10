<x-app-layout>
    <div class="center-main dashboard-header">
        <div class="menu">
            <div class="container">
                <div class="listing-inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="datatable-cnt">
                                @include('alert')
                                <div class="row">
                                    <div class="col-6 text-end offset-6">
                                        {{-- <a class="btn btn-secondary mb-2" id="product_filter_clear">Clear Filter</a> --}}
                                        <a href="{{ route('product.add') }}" class="btn btn-primary mb-2">Add Product</a>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-lg-8 col-md-6 pb-3 ">
                                        {{-- <form class="d-flex justify-content-md-start justify-content-center"  id="category-filter" >
                                            <div>
                                                <select class="form-select" name="categories">
                                                    <option value="">Select category</option>
                                                    @if(!empty($categories))
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-primary mx-lg-2 mx-1" >Find</button>
                                            </div>
                                        </form> --}}
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-6 pb-3">
                                        <form  id="price-filter" >
                                            <div class="d-flex align-items-center">
                                                <span class="text-nowrap pe-2">
                                                    Price
                                                </span>
                                                <div class="">
                                                    <input class="form-control" type="number" name="min_price" placeholder="Min" min="0">
                                                </div>
                                                <span class="px-2">
                                                    To
                                                </span>
                                                <div class="">
                                                    <input class="form-control" type="number" name="max_price" placeholder="Max" min="0">
                                                </div>
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary mx-lg-2 mx-1" >Find</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> --}}
                                </div>
                                <table id="product-list" class="table display" style="width:100%"
                                       data-action="{{ route('product.dataTable') }}">
                                    <thead>
                                    <tr>
                                        <th class="text-primary">Product</th>
                                        <th class="text-primary">Category</th>
                                        <th class="text-primary">Price</th>
                                        <th class="text-primary">Address</th>
                                        <th class="text-primary">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-lender-layout>
