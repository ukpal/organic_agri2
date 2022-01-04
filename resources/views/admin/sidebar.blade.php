<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{url('admin/dashboard')}}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                {{-- <li class="menu-title" data-key="t-apps">Apps</li> --}}

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-ecommerce">Ecommerce</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ecommerce-products.html" key="t-products">Products</a></li>
                        <li><a href="ecommerce-product-detail.html" data-key="t-product-detail">Product Detail</a></li>
                        <li><a href="ecommerce-orders.html" data-key="t-orders">Orders</a></li>
                        <li><a href="ecommerce-customers.html" data-key="t-customers">Customers</a></li>
                        <li><a href="ecommerce-cart.html" data-key="t-cart">Cart</a></li>
                        <li><a href="ecommerce-checkout.html" data-key="t-checkout">Checkout</a></li>
                        <li><a href="ecommerce-shops.html" data-key="t-shops">Shops</a></li>
                        <li><a href="ecommerce-add-product.html" data-key="t-add-product">Add Product</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="{{url('admin/seller')}}">
                        <i data-feather="users"></i>
                        <span data-key="t-chat">Seller</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/categories')}}">
                        <i data-feather="list"></i>
                        <span data-key="t-chat">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin/products')}}">
                        <i data-feather="box"></i>
                        <span data-key="t-chat">Products</span>
                    </a>
                </li>

                
        </div>
        <!-- Sidebar -->
    </div>
</div>