<div class="site-cart">
    <a href="#;" class="site-header__cart" title="Cart">
        <i class="icon anm anm-bag-l"></i>
        <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{ Cart::instance('cart')->count() > 0 ? Cart::instance('cart')->count() : '0' }}</span>
    </a>
    <!--Minicart Popup-->
    <div id="header-cart" class="block block-cart">
        <?php if (Cart::instance('cart')->count() > 0): ?>
            <ul class="mini-products-list">
                <?php foreach (Cart::instance('cart')->content() as $key): ?>
                    <li class="item">
                        <a class="product-image" href="{{ route('products.details', $key->model->slug) }}">
                            <img src="{{ asset('assets/images/product-images/' . $key->model->image) }}" alt="{{ $key->model->title }}" title="{{ $key->model->title }}" />
                        </a>
                        <div class="product-details">
                            <a href="#" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                            <a href="#" class="edit-i remove"><i class="anm anm-edit" aria-hidden="true"></i></a>
                            <a class="pName" href="{{ route('products.details', $key->model->slug) }}">{{ $key->model->title }}</a>
                            <div class="variant-cart">Black / XL</div>
                            <div class="wrapQtyBtn">
                                <div class="qtyField">
                                    <span class="label">Qty:</span>
                                    <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                    <input type="text" id="Quantity" name="quantity" value="{{ $key->qty }}" class="product-form__input qty">
                                    <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="priceRow">
                                <div class="product-price">
                                    <span class="money">${{ $key->subtotal }}</span>
                                </div>
                             </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="total">
                <div class="total-in">
                    <span class="label">Cart Subtotal:</span><span class="product-price"><span class="money">${{ Cart::instance('cart')->subtotal() }}</span></span>
                </div>
                 <div class="buttonSet text-center">
                    <a href="{{ route('cart') }}" class="btn btn-secondary btn--small">View Cart</a>
                    <a href="{{ route('checkout') }}" class="btn btn-secondary btn--small">Checkout</a>
                </div>
            </div>
        <?php else: ?>
            <ul class="mini-products-list d-flex justify-content-center align-items-center">
                <h3>Sorry...!! You have no Items in Cart</h3>
            </ul>
        <?php endif; ?>
    </div>
    <!--EndMinicart Popup-->
</div>
