<li><a href="{{ route('wishlist') }}" class="position-relative">
    Wishlist
    <span class="position-absolute top-100 start-100 translate-middle badge rounded-pill bg-light text-dark text-lowercase">{{ Cart::instance('wishlist')->count() > 0 ?  Cart::instance('wishlist')->count() : '0' }} items</span>
</a></li>
