<div class="content-wrapper">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                            <h3 class="card-title"><i class="fas fa-sitemap"></i> Shop Products Table</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.products.add') }}" class="btn btn-tool" title="Add New Product"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            @if (session('status'))
                               <div class="alert alert-success text-uppercase alert-dismissible fade show" role="alert">
                                   {{ session('status') }}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               </div>
                           @endif
                            <table id="example1" class="table table-hover text-nowrap table-striped table-bordered projects">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">ID</th>
                                        <th style="width: 22%">Name</th>
                                        <th style="width: 10%">Slug</th>
                                        <th style="width: 6%">Price</th>
                                        <th style="width: 6%">Sale</th>
                                        <th style="width: 6%">Image</th>
                                        <th style="width: 20%">Images</th>
                                        <th style="width: 8%">Stock Status</th>
                                        <th style="width: 8%">Featured</th>
                                        <th style="width: 8%">Quantity</th>
                                        <th style="width: 10%">Action</th>
                                        <th>SKU</th>
                                        <th>Short Description</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($products as $key): ?>
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td class="text-capitalize">
                                            <a>
                                                {{ $key->title }}
                                            </a>
                                            <br/>
                                            <small>
                                                Created {{ $key->created_at }}
                                            </small>
                                        </td>
                                        <td>{{ $key->slug }}</td>
                                        <td>{{ $key->regular_price }}</td>
                                        <td>{{ $key->sale_price }}</td>
                                        <td><img src="{{ asset('assets/images/product-images/' . $key->image) }}" alt="{{ $key->title }}" class="img-thumbnail mx-auto d-block" width="80px" height="20px"></td>
                                        <td>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/images/product-images/variant1.jpg') }}">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/images/product-images/variant2.jpg') }}">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/images/product-images/variant3.jpg') }}">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/images/product-images/variant4.jpg') }}">
                                                </li>
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{ asset('assets/images/product-images/variant5.jpg') }}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="project-state">
                                            <span class="badge {{ $key->stock_status == 'instock' ? 'badge-success' : 'badge-warning' }}">{{ $key->stock_status }}</span>
                                        </td>
                                        <td class="project-state">
                                            <span class="badge {{ $key->featured == '1' ? 'badge-success' : 'badge-warning' }}">{{ $key->featured == '0' ? 'No' : 'Yes' }}</span>
                                        </td>
                                        <td>{{ $key->quantity }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('admin.products.edit', $key->id) }}" class="btn btn-info btn-sm mr-1"><i class="far fa-edit"></i></a>
                                            <a href="#" onclick="confirm('Are you sure? You want to delete?') || event.stopImmediatePropagation()" class="btn btn-danger btn-sm" wire:click.prevent="deleteItem('{{ $key->id }}')"><i class="fas fa-trash"></i></a>
                                        </td>
                                        <td>{{ $key->sku }}</td>
                                        <td>{{ $key->short_description }}</td>
                                        <td>{{ Str::of($key->description)->words(32) }}</td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush
