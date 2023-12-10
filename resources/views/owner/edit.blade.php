<x-app-layout>
    <div class="center-main dashboard-header">
        <div class="menu">
            <div class="container">
                <div class="row mb-3">
                    <h2 class="text-center">Edit Product</h2>
                </div>
                <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input id="name"
                                   type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name"
                                   value="{{ old('name',$product->name) }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                            <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach (config('services.categories') as $key=>$category)
                                    <option value="{{ $key }}" {{ (old('category',$product->category) == $key) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="condition" class="form-label">Condition Of Item<span class="text-danger">*</span></label>
                            <textarea name="condition" id="condition" cols="5" rows="5" class="form-control @error('condition') is-invalid @enderror">{{ old('condition',$product->condition_of_item) }}</textarea>
                            @error('condition')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                            <input id="price"
                                   type="text"
                                   class="form-control @error('price') is-invalid @enderror"
                                   name="price"
                                   value="{{ old('price',$product->price) }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input id="image"
                                   type="file"
                                   class="form-control @error('image') is-invalid @enderror"
                                   name="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        @if($product->image)
                        <div class="mb-3">
                            <img src="{{ asset(str_replace('public','storage',$product->image)) }}" alt="img" width="100px">
                        </div>
                        @endif
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contect Number<span class="text-danger">*</span></label>
                            <input id="contact"
                                   type="text"
                                   class="form-control @error('contact') is-invalid @enderror"
                                   name="contact"
                                   value="{{ old('contact',$product->contact_number) }}">
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                            <textarea name="address" id="address" cols="5" rows="5" class="form-control @error('address') is-invalid @enderror">{{ old('address',$product->address) }}</textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm mx-2">Update</button>
                    <a class="btn btn-danger btn-sm " href="{{ route('dashboard') }}" role="button">Cancel</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
