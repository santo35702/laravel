<div class="content-wrapper">
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
                        <div class="card-body">
                            @if (session('status'))
                               <div class="alert alert-success text-uppercase alert-dismissible fade show" role="alert">
                                   {{ session('status') }}
                                   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               </div>
                           @endif
                            <div id="shopCarousel" class="carousel slide" data-ride="carousel">
                                <?php if ($carousel->count() > 0): ?>
                                    <ol class="carousel-indicators">
                                        <?php foreach ($carousel as $key): ?>
                                            <li data-target="#shopCarousel" data-slide-to="{{ $key->id }}"></li>
                                        <?php endforeach; ?>
                                        <!-- <li data-target="#shopCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#shopCarousel" data-slide-to="1"></li>
                                        <li data-target="#shopCarousel" data-slide-to="2"></li> -->
                                    </ol>
                                    <div class="carousel-inner">
                                        <?php foreach ($carousel as $key => $value): ?>
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{ asset('assets/images/slideshow-banners/' . $value->image) }}" alt="{{ $value->title }}">
                                              <div class="carousel-caption d-none d-md-block">
                                                  <h5 class="text-uppercase">{{ $value->title }}</h5>
                                                  <p class="text-uppercase">{{ $value->subtitle }}</p>
                                                  <div class="btn-group btn-group-sm" role="group" aria-label="Action Buttons">
                                                      <a href="{{ route('admin.carousel.edit', $value->id) }}" class="btn btn-primary">Edit</a>
                                                      <a href="#" class="btn btn-danger">Delete</a>
                                                  </div>
                                              </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($carousel->count() > 1): ?>
                                <a class="carousel-control-prev" href="#shopCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#shopCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-custom-icon" aria-hidden="true">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                                <?php endif; ?>
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

</script>
@endpush
