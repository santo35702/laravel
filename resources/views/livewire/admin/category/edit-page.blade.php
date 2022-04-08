<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit { Category Name}</li>
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
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-edit"></i> Update Information <small class="ml-2"><b class="badge badge-danger mr-1">Note:</b> All <span class="text-danger fa-2x">*</span> marks must fill required.</small></h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-tool" title="Go to Categories"><i class="fas fa-undo"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            @error('slug')
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-ban"></i>
                                    {{ $message }}
                                </div>
                            @enderror

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible text-uppercase" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <i class="icon fas fa-check-circle"></i>
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="updateItem">
                                <div class="row">
                                    <div class="col-6 mx-auto">
                                        <div class="form-group">
                                            <label for="name">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Categories Name" wire:model="name" wire:keyup="generateSlug">
                                            @error('name')
                                                <div id="name" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" wire:model="slug">
                                        </div>
                                        <div class="form-group" wire:ignore>
                                            <label for="description">Description <span class="text-danger">*</span></label>
                                            <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" id="description" rows="5" placeholder="Enter Description" required wire:model="description"></textarea>
                                            @error('description')
                                                <div id="name" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary" role="button">Cancel</a>
                                            <button type="submit" class="btn btn-success float-right">Save Changes</button>
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

        // TinyMCE
        tinymce.init({
            selector: '#tiny',
            plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange styleselect | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help',
            setup: function (editor) {
                editor.on('Change', function(e){
                    tinyMCE.triggerSave();
                    var s_data = $('#tiny').val();
                    @this.set('tiny', s_data);
                });
            }
        });
    });
</script>
@endpush
