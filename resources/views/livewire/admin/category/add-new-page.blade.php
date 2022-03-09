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
                            <h3 class="card-title"><i class="fas fa-edit"></i> Add New Categories</h3>

                            <div class="card-tools">
                                <a href="#" class="btn btn-tool" title="#"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-6 mx-auto">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <label for="name" class="input-group-text"><i class="fas fa-file-signature"></i></label>
                                            </div>
                                            <input type="text" class="form-control is-valid" id="name" placeholder="Enter Categories Name">
                                        </div>
                                        <input type="text" name="slug" value="">
                                        <div class="form-input">
                                            <textarea id="summernote" class="form-control" placeholder="Enter Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default">Cancel</button>
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
