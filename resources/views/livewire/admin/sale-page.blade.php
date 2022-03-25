<div class="content-wrapper">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Flash Sale Timer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Manage Sale</li>
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
                            <h3 class="card-title"><i class="fas fa-edit"></i> Update Sale <small class="ml-2"><b class="badge badge-danger mr-1">Note:</b> All <span class="text-danger fa-2x">*</span> marks must fill required.</small></h3>

                            <div class="card-tools">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-tool" title="Go to Dashboard"><i class="fas fa-undo"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success text-uppercase alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            @endif


                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <form wire:submit.prevent="updateSale">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="custom-select" wire:model="status">
                                                <option value="1">Active</option>
                                                <option value="0">In-Active</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="text" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#datepicker" id="datepicker" wire:model="sale_date"/>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="date">Date</label>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" id="sale_date" wire:model="sale_date"/>
                                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-default" role="button">Cancel</a>
                                            <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
    // Datepicker
    $('#datepicker').datetimepicker()
    .on('dp.change', function (ev) {
        var data = $('#datepicker').val();
        @this.set('sale_date', data);
    });
  })
</script>
@endpush
