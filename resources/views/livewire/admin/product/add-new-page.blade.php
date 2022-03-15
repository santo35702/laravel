<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-info-circle"></i> Products Information <small class="ml-2"><b class="badge badge-danger mr-1">Note:</b> All <span class="text-danger fa-2x">*</span> marks must fill required.</small></h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-tool" title="Go to Categories"><i class="fas fa-undo"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-uppercase" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="storeItem">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="title" class="input-group-text">Name <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" id="title" placeholder="Enter Products Name" wire:model="title" wire:keyup="generateSlug">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" wire:model="slug">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="short_description" class="input-group-text">Short Description <span class="text-danger">*</span></label>
                                            </div>
                                            <textarea class="form-control" placeholder="Enter Short Description" required wire:model="short_description"></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="regular_price" class="input-group-text">Regular Price <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="number" class="form-control" id="regular_price" placeholder="Enter Products Regular Price" wire:model="regular_price">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="sale_price" class="input-group-text">Sale Price</label>
                                            </div>
                                            <input type="number" class="form-control" id="sale_price" placeholder="Enter Products Sale Price" wire:model="sale_price">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <label for="image" class="custom-file-label">Product Image <span class="text-danger">*</span></label>
                                                <input type="file" class="custom-file-input" id="image" wire:model="image">
                                                <?php if ($image): ?>
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Product Image" class="img-fluid img-thumbnail mb-3" width="100">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="category" class="input-group-text">Category <span class="text-danger">*</span></label>
                                            </div>
                                            <select class="custom-select" id="category" required wire:model="category">
                                                <option>Select Category...</option>
                                                <?php foreach (\App\Models\Category::orderBy('name', 'ASC')->get() as $key): ?>
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="4" placeholder="Enter Description" required wire:model="description"></textarea>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="stock" class="input-group-text">Stock Status</label>
                                            </div>
                                            <select class="custom-select" id="stock" required wire:model="stock_status">
                                                <option value="instock">In-Stock</option>
                                                <option value="outofstock">Out of Stock</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="featured" class="input-group-text">Featured</label>
                                            </div>
                                            <select class="custom-select" id="featured" required wire:model="featured">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="quantity" class="input-group-text">Quantity <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" id="quantity" placeholder="Enter Products Quantity" wire:model="quantity">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="sku" class="input-group-text">SKU <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" id="sku" placeholder="Enter Products SKU" wire:model="sku">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.products.index') }}" class="btn btn-default" role="button">Cancel</a>
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('script')
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote();
  })
</script>
@endpush
