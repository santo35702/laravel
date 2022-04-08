<div id="page-content">
    <!--Page Title-->
    <div class="page section-header text-center">
        <div class="page-title">
            <div class="wrapper">
                <h1 class="page-width">Wish List</h1>
            </div>
        </div>
    </div>
    <!--End Page Title-->

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                <?php if (Cart::instance('wishlist')->content()->count() > 0): ?>
                <form action="#">
                    <div class="wishlist-table table-content table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-name text-center alt-font">Remove</th>
                                    <th class="product-price text-center alt-font">Images</th>
                                    <th class="product-name alt-font">Product</th>
                                    <th class="product-price text-center alt-font">Unit Price</th>
                                    <th class="stock-status text-center alt-font">Stock Status</th>
                                    <th class="product-subtotal text-center alt-font">Add to Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (Cart::instance('wishlist')->content() as $key): ?>
                                <tr>
                                    <td class="product-remove text-center" valign="middle"><a href="#" title="Remove from Wishlist" wire:click.prevent="removeFromWishlist({{ $key->id }})"><i class="icon icon anm anm-times-l"></i></a></td>
                                    <td class="product-thumbnail text-center">
                                        <a href="{{ route('products.details', $key->model->slug) }}"><img src="{{ asset('assets/images/product-images/' . $key->model->image) }}" alt="{{ $key->model->title }}" title="{{ $key->model->title }}" /></a>
                                    </td>
                                    <td class="product-name text-capitalize">
                                        <h4 class="no-margin"><a href="{{ route('products.details', $key->model->slug) }}">{{ $key->model->title }}</a></h4>
                                    </td>
                                    <td class="product-price text-center"><span class="amount">${{ $key->model->regular_price }}</span></td>
                                    <td class="stock text-center text-capitalize">
                                        <span class="in-stock">{{ $key->model->stock_status }}</span>
                                    </td>
                                    <td class="product-subtotal text-center"><button type="button" class="btn btn-small">Add To Cart</button></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
                <?php else: ?>
                    <div class="jumbotron d-flex justify-content-between">
                        <div>
                            <h1 class="display-4">Sorry...!!</h1>
                            <p class="lead">You have not added any products in your Wishlist.</p>
                            <hr class="my-4">
                            <p>You can check our all products, and you may added it here.</p>
                            <a class="btn btn-primary btn-lg" href="{{ route('products.index') }}" role="button">Click here</a>
                        </div>
                        <img src="{{ asset('assets/images/cart.png')}}" alt="Cart logo">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
