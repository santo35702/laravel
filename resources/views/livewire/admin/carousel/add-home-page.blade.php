<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Carousel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.carousel.index') }}">Carousel</a></li>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-pen"></i> Carousel Information <small class="ml-2"><b class="badge badge-danger mr-1">Note:</b> All <span class="text-danger fa-2x">*</span> marks must fill required.</small></h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.carousel.index') }}" class="btn btn-tool" title="Go to Carousel"><i class="fas fa-undo"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-uppercase" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="storeItem" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="title" class="input-group-text">Title <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" id="title" placeholder="Enter Carousel Title" wire:model="title">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="link" class="input-group-text">Link <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" wire:model="link">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="subtitle" class="input-group-text">Subtitle <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" wire:model="subtitle">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <label for="image" class="custom-file-label">Image <span class="text-danger">*</span></label>
                                                <input type="file" class="custom-file-input" id="image" wire:model="image">
                                                <?php if ($image): ?>
                                                    <img src="{{ $image->temporaryUrl() }}" alt="Product Image" class="img-fluid img-thumbnail mb-3" width="100">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="status" class="input-group-text">Status <span class="text-danger">*</span></label>
                                            </div>
                                            <select class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">In-active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <a href="{{ route('admin.carousel.index') }}" class="btn btn-default" role="button">Cancel</a>
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
