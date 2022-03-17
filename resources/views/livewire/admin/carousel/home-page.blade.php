<div class="content-wrapper">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Carousel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Carousel</li>
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
                            <h3 class="card-title"><i class="fas fa-sliders-h"></i> Shop Carousel</h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.carousel.add') }}" class="btn btn-tool" title="Add New Carousel"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            @if (session('status'))
                               <div class="alert alert-success text-uppercase alert-dismissible fade show" role="alert">
                                   {{ session('status') }}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               </div>
                           @endif
                            <table id="example1" class="table table-hover table-striped table-bordered projects">
                                <thead>
                                    <tr>
                                        <th style="width: 2%">ID</th>
                                        <th style="width: 23%">Title</th>
                                        <th style="width: 30%">Sub-Title</th>
                                        <th style="width: 7%">Image</th>
                                        <th style="width: 7%">Status</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sl = 1; ?>
                                    <?php foreach ($carousel as $key): ?>
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
                                            <td>{{ $key->subtitle }}</td>
                                            <td>
                                                <img src="{{ asset('assets/images/slideshow-banners/' . $key->image) }}" alt="{{ $key->title }}" class="img-thumbnail mx-auto d-block" width="80px" height="20px">
                                            </td>
                                            <td class="project-state">
                                                <span class="badge {{ $key->status == '1' ? 'badge-success' : 'badge-warning' }}">{{ $key->status == '1' ? 'Active' : 'In-Active' }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <a href="{{ route('admin.carousel.edit', $key->id) }}" class="btn btn-info btn-sm mr-1"><i class="far fa-edit"></i></a>
                                                <a href="#" onclick="confirm('Are you sure? You want to delete?') || event.stopImmediatePropagation()" class="btn btn-danger btn-sm" wire:click.prevent="deleteItem('{{ $key->id }}')"><i class="fas fa-trash"></i></a>
                                            </td>
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
