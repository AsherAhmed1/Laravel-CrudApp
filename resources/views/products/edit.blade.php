<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="bg-dark py-3">
        <h3 class="text-white text-center">CRUD Application</h3>
    </div>

    <div class="container">

        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4">
                    <div class="card-header bg-dark text-white">
                        <h3>Edit Product</h3>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('products.update', $product->id) }}" method="POST">
                    @method('PUT')    
                    @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label h4">Name</label>
                                <input type="text" value="{{ old('name', $product->name) }}"
                                    class="form-control form-control-lg @error ('name') is-invalid @enderror"
                                    placeholder="Insert product name" name="name">

                                @error ('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sku" class="form-label h4">SKU</label>
                                <input type="text" value="{{ old('sku', $product->sku) }}"
                                    class="form-control form-control-lg @error ('sku') is-invalid @enderror"
                                    placeholder="Insert product SKU" name="sku">

                                @error ('sku')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label h4">Price</label>
                                <input value="{{ old('price', $product->price) }}" type="text"
                                    class="form-control form-control-lg @error ('price') is-invalid @enderror"
                                    placeholder="Insert product Price" name="price">

                                @error ('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label h4">Description</label>
                                <textarea {{ old('description', $product->description) }} name="description"
                                    class="form-control" cols="30" rows="5"
                                    placeholder="Insert the description of the data"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label h4">Image</label>
                                <input type="file" name="image" class="form-control"></input>
                                @if ($product->image != "")
                                    <img class="w-50 my-3" src="{{ asset("uploads/products/" . $product->image) }}" alt="">
                                @endif
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>