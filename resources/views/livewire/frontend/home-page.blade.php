<div id="page-content">
    <!--Home slider-->
    <div class="slideshow slideshow-wrapper pb-section sliderFull">
        <div class="home-slideshow">
            <!-- slide start -->
            <?php foreach ($carousel as $key): ?>
                <div class="slide">
                    <div class="blur-up lazyload bg-size">
                        <img class="blur-up lazyload bg-img" data-src="{{ asset('assets/images/slideshow-banners/' . $key->image) }}" src="{{ asset('assets/images/slideshow-banners/' . $key->image) }}" alt="{{ $key->title }}" title="{{ $key->title }}" />
                        <div class="slideshow__text-wrap slideshow__overlay classic bottom">
                            <div class="slideshow__text-content bottom">
                                <div class="wrap-caption center">
                                    <h2 class="h1 mega-title slideshow__title">{{ $key->title }}</h2>
                                    <span class="mega-subtitle slideshow__subtitle">{{ $key->subtitle }}</span>
                                    <a href="{{ $key->link }}" class="btn">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- slide end -->
        </div>
    </div>
    <!--End Home slider-->
    <!--Collection Tab slider-->
    <div class="tab-slider-product section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">New Arrivals</h2>
                        <p>Browse the huge variety of our products</p>
                    </div>
                    <div class="tabs-listing">
                        <ul class="tabs clearfix">
                            <?php foreach ($new_arrival as $key => $value): ?>
                                <li class="{{ $key == 0 ? 'active' : '' }}" rel="tab{{ $value->id }}">{{ $value->name }}</li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab_container">
                            <?php foreach ($new_arrival as $key): ?>
                                <?php
                                    $products = DB::table('products')->where('category_id', $key->id)->get()->take($no_of_products);
                                 ?>
                                <div id="tab{{ $key->id }}" class="tab_content grid-products">
                                    <div class="productSlider">
                                        <?php foreach ($products as $key): ?>
                                            <div class="col-12 item">
                                                <!-- start product image -->
                                                <div class="product-image">
                                                    <!-- start product image -->
                                                    <a href="{{ route('products.details', $key->slug) }}">
                                                        <!-- image -->
                                                        <img class="primary blur-up lazyload" data-src="{{ asset('assets/images/product-images/' . $key->image) }}" src="{{ asset('assets/images/product-images/' . $key->image) }}" alt="{{ $key->title }}" title="{{ $key->title }}">
                                                        <!-- End image -->
                                                        <!-- Hover image -->
                                                        <img class="hover blur-up lazyload" data-src="{{ asset('assets/images/product-images/product-image1-1.jpg') }}" src="{{ asset('assets/images/product-images/product-image1-1.jpg') }}" alt="{{ $key->title }}" title="{{ $key->title }}">
                                                        <!-- End hover image -->
                                                        <!-- product label -->
                                                        <div class="product-labels rectangular"><span class="lbl on-sale">Sale</span> <span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span> <span class="lbl pr-label2">Hot</span></div>
                                                        <!-- End product label -->
                                                    </a>
                                                    <!-- end product image -->

                                                    <!-- countdown start -->
                                                    <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                    <!-- countdown end -->

                                                    <!-- Start product button -->
                                                    <a href="#" class="variants add btn btn-addto-cart" wire:click.prevent="AddToCart({{ $key->id }}, '{{ $key->title }}', {{ $key->regular_price }})">Add To Cart</a>
                                                    <div class="button-set">
                                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                            <i class="icon anm anm-search-plus-r"></i>
                                                        </a>
                                                        <div class="wishlist-btn">
                                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
                                                                <i class="icon anm anm-heart-l"></i>
                                                            </a>
                                                        </div>
                                                        <div class="compare-btn">
                                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                                <i class="icon anm anm-random-r"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- end product button -->
                                                </div>
                                                <!-- end product image -->
                                                <!--start product details -->
                                                <div class="product-details text-center">
                                                    <!-- product name -->
                                                    <div class="product-name text-capitalize">
                                                        <a href="{{ route('products.details', $key->slug) }}">{{ $key->title }}</a>
                                                    </div>
                                                    <!-- End product name -->
                                                    <!-- product price -->
                                                    <div class="product-price">
                                                        <span class="old-price">${{ $key->regular_price }}</span>
                                                        <span class="price">${{ $key->sale_price }}</span>
                                                    </div>
                                                    <!-- End product price -->

                                                    <div class="product-review">
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star"></i>
                                                        <i class="font-13 fa fa-star-o"></i>
                                                        <i class="font-13 fa fa-star-o"></i>
                                                    </div>
                                                    <!-- Variant -->
                                                    <ul class="swatches">
                                                        <li class="swatch medium rounded"><img src="{{ asset('assets/images/product-images/variant1.jpg') }}" alt="image" /></li>
                                                        <li class="swatch medium rounded"><img src="{{ asset('assets/images/product-images/variant2.jpg') }}" alt="image" /></li>
                                                        <li class="swatch medium rounded"><img src="{{ asset('assets/images/product-images/variant3.jpg') }}" alt="image" /></li>
                                                        <li class="swatch medium rounded"><img src="{{ asset('assets/images/product-images/variant4.jpg') }}" alt="image" /></li>
                                                        <li class="swatch medium rounded"><img src="{{ asset('assets/images/product-images/variant5.jpg') }}" alt="image" /></li>
                                                    </ul>
                                                    <!-- End Variant -->
                                                </div>
                                                <!-- End product details -->
                                                <!-- countdown start -->
                                                <div class="timermobile">
                                                    <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                                </div>
                                                <!-- countdown end -->
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Collection Tab slider-->

    <!--Collection Box slider-->
    <div class="collection-box section">
        <div class="container-fluid">
            <div class="collection-grid">
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/collection/fashion.jpg" src="assets/images/collection/fashion.jpg" alt="Fashion" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Fashion</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img class="blur-up lazyload" data-src="assets/images/collection/cosmetic.jpg" src="assets/images/collection/cosmetic.jpg" alt="Cosmetic"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Cosmetic</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item blur-up lazyloaded">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/collection/bag.jpg" src="assets/images/collection/bag.jpg" alt="Bag" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Bag</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/collection/accessories.jpg" src="assets/images/collection/accessories.jpg" alt="Accessories" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Accessories</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/collection/shoes.jpg" src="assets/images/collection/shoes.jpg" alt="Shoes" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Shoes</h3>
                            </div>
                        </a>
                    </div>
                    <div class="collection-grid-item">
                        <a href="collection-page.html" class="collection-grid-item__link">
                            <img data-src="assets/images/collection/jewellry.jpg" src="assets/images/collection/jewellry.jpg" alt="Jewellry" class="blur-up lazyload"/>
                            <div class="collection-grid-item__title-wrapper">
                                <h3 class="collection-grid-item__title btn btn--secondary no-border">Jewellry</h3>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    <!--End Collection Box slider-->

    <!--Logo Slider-->
    <div class="section logo-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="logo-bar">
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo1.png" alt="" title="" />
                </div>
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo2.png" alt="" title="" />
                </div>
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo3.png" alt="" title="" />
                </div>
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo4.png" alt="" title="" />
                </div>
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo5.png" alt="" title="" />
                </div>
                <div class="logo-bar__item">
                    <img src="assets/images/logo/brandlogo6.png" alt="" title="" />
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Logo Slider-->

    <!--Featured Product-->
    <div class="product-rows section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Featured collection</h2>
                        <p>Our most popular products based on sales</p>
                    </div>
                </div>
            </div>
            <div class="grid-products">
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image1.jpg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image1-1.jpg" src="assets/images/product-images/product-image1-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">Edna Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$500.00</span>
                                    <span class="price">$600.00</span>
                                </div>
                                <!-- End product price -->

                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- Variant -->
                            <ul class="swatches text-center">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant5.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant6.jpg" alt="image" /></li>
                            </ul>
                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image2.jpg" src="assets/images/product-images/product-image2.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image2-1.jpg" src="assets/images/product-images/product-image2-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">Elastic Waist Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$748.00</span>
                                </div>
                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- Variant -->
                            <ul class="swatches text-center">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2-1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2-2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2-3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2-4.jpg" alt="image" /></li>
                            </ul>
                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image3.jpg" src="assets/images/product-images/product-image3.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image3-1.jpg" src="assets/images/product-images/product-image3-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">3/4 Sleeve Kimono Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$550.00</span>
                                </div>
                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- Variant -->
                            <ul class="swatches text-center">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-4.jpg" alt="image" /></li>
                            </ul>
                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image4.jpg" src="assets/images/product-images/product-image4.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image4-1.jpg" src="assets/images/product-images/product-image4-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">Cape Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$900.00</span>
                                    <span class="price">$788.00</span>
                                </div>
                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- Variant -->
                            <ul class="swatches text-center">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4-1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4-2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4-3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4-4.jpg" alt="image" /></li>
                            </ul>
                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image5.jpg" src="assets/images/product-images/product-image5.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image5-1.jpg" src="assets/images/product-images/product-image5-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">Paper Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$900.00</span>
                                    <span class="price">$788.00</span>
                                </div>
                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- Variant -->
                            <ul class="swatches text-center">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3-4.jpg" alt="image" /></li>
                            </ul>
                                            <!-- End Variant -->
                            <!-- End product details -->
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 item grid-view-item style2">
                        <div class="grid-view_image">
                            <!-- start product image -->
                            <a href="product-accordion.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="grid-view-item__image primary blur-up lazyload" data-src="assets/images/product-images/product-image16.jpg" src="assets/images/product-images/product-image16.jpg" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="grid-view-item__image hover blur-up lazyload" data-src="assets/images/product-images/product-image16-1.jpg" src="assets/images/product-images/product-image16-1.jpg" alt="image" title="product">
                                <!-- End hover image -->
                            </a>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details hoverDetails text-center mobile">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-accordion.html">Buttercup Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$420.00</span>
                                </div>
                                <!-- product button -->
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <!-- Start product button -->
                                    <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                        <button class="btn cartIcon btn-addto-cart" type="button" tabindex="0"><i class="icon anm anm-bag-l"></i></button>
                                    </form>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- End product details -->
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <!--End Featured Product-->

    <!--Latest Blog-->
    <div class="latest-blog section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="section-header text-center">
                        <h2 class="h2">Latest From our Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap-blog">
                        <a href="blog-left-sidebar.html" class="article__grid-image">
                            <img src="assets/images/blog/post-img1.jpg" alt="It's all about how you wear" title="It's all about how you wear" class="blur-up lazyloaded"/>
                        </a>
                        <div class="article__grid-meta article__grid-meta--has-image">
                            <div class="wrap-blog-inner">
                                <h2 class="h3 article__title">
                                  <a href="blog-left-sidebar.html">It's all about how you wear</a>
                                </h2>
                                <span class="article__date">May 02, 2017</span>
                                <div class="rte article__grid-excerpt">
                                    I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account...
                                </div>
                                <ul class="list--inline article__meta-buttons">
                                    <li><a href="blog-article.html">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="wrap-blog">
                        <a href="blog-left-sidebar.html" class="article__grid-image">
                            <img src="assets/images/blog/post-img2.jpg" alt="27 Days of Spring Fashion Recap" title="27 Days of Spring Fashion Recap" class="blur-up lazyloaded"/>
                        </a>
                        <div class="article__grid-meta article__grid-meta--has-image">
                            <div class="wrap-blog-inner">
                                <h2 class="h3 article__title">
                                  <a href="blog-right-sidebar.html">27 Days of Spring Fashion Recap</a>
                                </h2>
                                <span class="article__date">May 02, 2017</span>
                                <div class="rte article__grid-excerpt">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab...
                                </div>
                                <ul class="list--inline article__meta-buttons">
                                    <li><a href="blog-article.html">Read more</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Latest Blog-->

    <!--Store Feature-->
    <div class="store-feature section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="display-table store-info">
                        <li class="display-table-cell">
                            <i class="icon anm anm-truck-l"></i>
                            <h5>Free Shipping &amp; Return</h5>
                            <span class="sub-text">Free shipping on all US orders</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-dollar-sign-r"></i>
                            <h5>Money Guarantee</h5>
                            <span class="sub-text">30 days money back guarantee</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-comments-l"></i>
                            <h5>Online Support</h5>
                            <span class="sub-text">We support online 24/7 on day</span>
                        </li>
                        <li class="display-table-cell">
                            <i class="icon anm anm-credit-card-front-r"></i>
                            <h5>Secure Payments</h5>
                            <span class="sub-text">All payment are Secured and trusted.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Store Feature-->
</div>

@push('script')
    <script>
       jQuery(document).ready(function(){
         jQuery('.closepopup').on('click', function () {
             jQuery('#popup-container').fadeOut();
             jQuery('#modalOverly').fadeOut();
         });

         var visits = jQuery.cookie('visits') || 0;
         visits++;
         jQuery.cookie('visits', visits, { expires: 1, path: '/' });
         console.debug(jQuery.cookie('visits'));
         if ( jQuery.cookie('visits') > 1 ) {
           jQuery('#modalOverly').hide();
           jQuery('#popup-container').hide();
         } else {
             var pageHeight = jQuery(document).height();
             jQuery('<div id="modalOverly"></div>').insertBefore('body');
             jQuery('#modalOverly').css("height", pageHeight);
             jQuery('#popup-container').show();
         }
         if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
       });

       jQuery(document).mouseup(function(e){
         var container = jQuery('#popup-container');
         if( !container.is(e.target)&& container.has(e.target).length === 0)
         {
           container.fadeOut();
           jQuery('#modalOverly').fadeIn(200);
           jQuery('#modalOverly').hide();
         }
       });
    </script>
@endpush
