<div>
    <!-- Page Content -->
        <div class="content">
          <!-- Toggle Side Content -->
          <!-- Class Toggle, functionality initialized in Helpers.oneToggleClass() -->
          <div class="d-xl-none push">
            <div class="row g-sm">
              <div class="col-6">
                <button type="button" class="btn btn-alt-secondary w-100" data-toggle="class-toggle" data-target=".js-ecom-div-nav" data-class="d-none">
                  <i class="fa fa-fw fa-bars text-muted me-1"></i> Navigation
                </button>
              </div>
              <div class="col-6">
                <button type="button" class="btn btn-alt-secondary w-100" data-toggle="class-toggle" data-target=".js-ecom-div-cart" data-class="d-none">
                  <i class="fa fa-fw fa-shopping-cart text-muted me-1"></i> Cart (3)
                </button>
              </div>
            </div>
          </div>
          <!-- END Toggle Side Content -->

          <div class="row push">
            <div class="col-xl-4 order-xl-1">
              {{-- <!-- Categories -->
              <div class="block block-rounded js-ecom-div-nav d-none d-xl-block">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    <i class="fa fa-fw fa-boxes text-muted me-1"></i> Categories
                  </h3>
                </div>
                <div class="block-content">
                  <ul class="nav nav-pills flex-column push">

                    @foreach ($kategoris as $kategori)
                    <li class="nav-item mb-1">
                      <a class="nav-link d-flex justify-content-between align-items-center" href="javascript:void(0)">
                        {{ $kategori->nama_kategori }} <span class="badge rounded-pill bg-black-50 ms-1">7k</span>
                      </a>
                    </li>
                    @endforeach

                  </ul>
                </div>
              </div>
              <!-- END Categories --> --}}

              <!-- Shopping Cart -->
              <div class="block block-rounded js-ecom-div-cart d-none d-xl-block">
                <div class="block-header block-header-default">
                  <h3 class="block-title">
                    <i class="fa fa-fw fa-shopping-cart text-muted me-1"></i> Shopping Cart (3)
                  </h3>
                </div>
                <div class="block-content">
                  <table class="table table-borderless table-hover table-vcenter">
                    <tbody>

                      @foreach ($carts as $cart)
                        
                      <tr>
                        <td class="text-center">
                          <a class="text-muted" wire:click="deletecart({{ $cart->id }})" href="javascript:void(0)"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                          <a class="h6" href="be_pages_ecom_store_product.html">{{ $cart->menu->nama_menu }}</a>
                          <div class="fs-sm text-muted">Beautifully crafted icon set</div>
                        </td>
                        <td class="text-end">
                          <div class="fw-semibold">Rp. {{ number_format($cart->menu->harga) }}</div>
                        </td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
                <div class="block-content block-content-full bg-body-light text-end">
                  <a class="btn btn-primary" href="be_pages_ecom_store_checkout.html">
                    Checkout
                    <i class="fa fa-arrow-right opacity-50 ms-1"></i>
                  </a>
                </div>
              </div>
              <!-- END Shopping Cart -->
            </div>
            <div class="col-xl-8 order-xl-0">
              <a class="btn btn-sm btn-success mb-4" href="/menu/create"> <i class="fa fa-plus"></i> Add New Menu</a>
              <!-- Sort and Show Filters -->
              <div class="d-flex justify-content-between">
                <div class="input-group mb-3">
                  <input type="text" placeholder="Search..." name="search" wire:model="search" class="form-control">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                </div>
                
              </div>
              <!-- END Sort and Show Filters -->

              <!-- Products -->
              <div class="row items-push">

                @foreach ($menus as $menu)
                <div class="col-md-6 col-xl-6">
                  <div class="block block-rounded h-100 mb-0">
                    <div class="block-content p-1">
                      <div class="options-container">
                        <img class="img-fluid options-item" src="{{ asset('storage/'.$menu->foto) }}" alt="">
                        <div class="options-overlay bg-black-75">
                          <div class="">
                            
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="block-content">
                      <div class="options-overlay-content">
                      
                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)" wire:click="cart({{ $menu->id }})">
                              <i class="fa fa-plus text-success text-sm  me-1"></i> Add to cart
                            </a>
                            <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                              <i class="fa fa-pencil text-success text-sm me-1"></i> Edit
                            </a>
                            </div>
                      <div class="text-warning mt-3">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <span class="text-primary">(480)</span>
                      </div>
                      <div class="mb-1">
                        <div class="fw-semibold float-end ms-1">Rp. {{ number_format($menu->harga) }}</div>
                        <a class="h6" href="be_pages_ecom_store_product.html">{{ $menu->nama_menu }}</a>
                      </div>
                      <p class="fs-sm text-muted">{{ $menu->deskripsi }}</p>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
              <div class="text-end">
                <a class="btn btn-alt-secondary" href="be_pages_ecom_store_products.html">
                  Next Page <i class="fa fa-arrow-right ms-1"></i>
                </a>
              </div>
              <!-- END Products -->
            </div>
          </div>
        </div>
        <!-- END Page Content -->
</div>
