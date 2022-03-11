<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
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
                            <h3 class="card-title"><i class="fas fa-edit"></i> Categories Information <small class="ml-2"><b class="badge badge-danger mr-1">Note:</b> All <span class="text-danger fa-2x">*</span> marks must fill required.</small></h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-tool" title="Go to Categories"><i class="fas fa-undo"></i></a>
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
                                    <div class="col-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="name" class="input-group-text"><i class="fas fa-file-signature"></i> <span class="text-danger">*</span></label>
                                            </div>
                                            <input type="text" class="form-control" id="name" placeholder="Enter Categories Name" wire:model="name" wire:keyup="generateSlug">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" wire:model="slug">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" placeholder="Enter Description" required wire:model="description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <!-- <button type="button" class="btn btn-default">Cancel</button> -->
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
