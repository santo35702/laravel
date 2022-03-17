<div class="content-wrapper">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage New Arrivals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Arrivals</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success card-outline shadow">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <h3 class="card-title"><i class="fas fa-sitemap"></i> New Arrivals Categories</h3>
                                </div>
                                <div class="col-4">
                                    <ul class="nav nav-pills nav-fill justify-content-center card-header-pills" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-toggle="tab" href="#list">List All</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-toggle="tab" href="#form">Update</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-4">
                                    <div class="card-tools text-right">
                                        <a href="#" class="btn btn-tool"><i class="fas fa-sync"></i></a>
                                        <button type="button" class="btn btn-tool" data-card-widget="maximize" title="Expand">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-uppercase alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sl = 1;
                                            @endphp
                                            @foreach ($new_arrival as $key)
                                                <tr>
                                                    <td>{{ $sl++ }}</td>
                                                    <td>{{ $key->name }}</td>
                                                    <td>{{ $key->slug }}</td>
                                                    <td>{{ $key->description }}</td>
                                                    {{-- <td class="d-flex justify-content-center align-items-center">
                                                        <a href="{{ route('admin.categories.edit', $key->id) }}" class="btn btn-info btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                                        <a href="#" onclick="confirm('Are you sure, you want to Delete?') || event.stopImmediatePropagation()" class="btn btn-danger btn-sm" wire:click.prevent="deleteItem('{{ $key->id }}')"><i class="fas fa-trash"></i></a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form">
                                    <form wire:submit.prevent="updateItem" enctype="multipart/form-data">
                                        <div class="form-group" wire:ignore>
                                            <label for="category">Category</label>
                                            <select class="custom-select select2 w-100" id="category" name="category[]" multiple="multiple" wire:model="category_id">
                                                @foreach (\App\Models\Category::orderBy('name', 'ASC')->get() as $key)
                                                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_of_products">No of Products</label>
                                            <input type="text" class="form-control" id="no_of_products" placeholder="Enter Products Number" wire:model="no_of_products">
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="btn btn-secondary">Cancel</a>
                                            <button type="submit" class="btn btn-success float-right">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@push('script')
<style media="screen">
    span.select2 { width: 100% !important; }
</style>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
        placeholder: 'Select an option'
    });
    $('.select2').on('change', function (e) {
        var data = $('.select2').select2("val");
        $this.set('category_id', data);
    });
  })
</script>
@endpush
