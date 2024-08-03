<div>
    <!-- Page Content -->
        <div class="content">
          <!-- Quick Overview -->
          <div class="row">
            
            <div class="col-6 col-lg-3">
              <a class="block block-rounded text-center" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-2 fw-semibold text-success">{{ count($category_all) }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                  <p class="fw-medium fs-sm text-success mb-0">
                    Total Categories
                  </p>
                </div>
              </a>
            </div>
            
          </div>
          <!-- END Quick Overview -->

          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Add New Category</h3>
            </div>
            <div class="block-content">
              <div class="row">
                  <div class="col-lg-6">
                      <form>
                              <label for="">Category Name</label>
                              <input wire:model="nama_kategori" type="text" name="nama_kategori" id="" class="form-control mb-3">
                              @error('nama_kategori')
                                  <span class="text-danger text-sm">{{ $message }} <br></span>
                              @enderror
                              
                              <button  wire:click.prevent="createKategori" class="btn btn-primary mt-3 mb-3">Submit</button>
                      </form>
                  </div>
              </div>
            </div>
          </div>

          <!-- All Categories -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">All Categories</h3>
              <div class="block-options">
                <div class="dropdown">
                  <button type="button" class="btn-block-option" id="dropdown-ecom-filters" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filters <i class="fa fa-angle-down ms-1"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      New
                      <span class="badge bg-success rounded-pill">260</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      Out of Stock
                      <span class="badge bg-danger rounded-pill">24</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                      All
                      <span class="badge bg-primary rounded-pill">14503</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-content">
              <!-- Search Form -->
              <form >
                <div class="mb-4">
                  <div class="input-group">
                    <input wire:model.live="search" type="text" class="form-control form-control-alt" id="one-ecom-products-search" name="one-ecom-products-search" placeholder="Search all categories..">
                    <span class="input-group-text bg-body border-0">
                      <i class="fa fa-search"></i>
                    </span>
                  </div>
                </div>
              </form>
              <!-- END Search Form -->

              {{-- Alert --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <p class="mb-0">
                      Success add new Category 
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            @endif
              {{-- End Alert --}}

              <!-- All Categories Table -->
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-vcenter">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 100px;">ID</th>
                      <th class="d-none d-md-table-cell">Category Name</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no =1;
                    @endphp
                    @if (count($categories)<1)
                        <tr>
                            <td colspan="3"><center><small>There is no data entry</small></center></td>
                        </tr>
                    @endif
                    @foreach ($categories as $cat)
                        <tr>
                        <td class="text-center fs-sm">
                            <a class="fw-semibold" href="be_pages_ecom_product_edit.html">
                            <strong>{{ $no++ }}</strong>
                            </a>
                        </td>
                        <td class="d-none d-md-table-cell fs-sm">
                            @if ($id_kategori === $cat->id)
                                <input wire:model="edit_kategori" type="text" class="form-control mb-3 col-lg-1" id="">
                                @error('edit_kategori')
                                    <span class="text-danger text-sm">{{ $message }} <br></span>
                                @enderror
                                <button wire:click.prevent="update" class="btn btn-sm btn-success">Update</button>
                                <button wire:click.prevent="cancelEdit" class="btn btn-sm btn-danger">Cancel</button>
                            @else
                                <strong>{{ $cat->nama_kategori }}</strong>
                            @endif
                        </td>
                        
                        <td class="text-center fs-sm">
                            <button wire:click="edit({{ $cat->id }})" class="btn btn-sm btn-alt-success" data-bs-toggle="tooltip" title="Edit">
                            <i class="fa fa-fw fa-pencil"></i>
                            </button>
                            <a class="btn btn-sm btn-alt-danger" href="javascript:void(0)" data-bs-toggle="tooltip" title="Delete">
                            <i class="fa fa-fw fa-times text-danger"></i>
                            </a>
                        </td>
                        </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- END All Categories Table -->

              <!-- Pagination -->
              {{-- <nav aria-label="Photos Search Navigation"> --}}
                <div class="my-2">
                {{ $categories->links() }}
                </div>
              {{-- </nav> --}}
              <!-- END Pagination -->
            </div>
          </div>
          <!-- END All Categories -->
        </div>
        <!-- END Page Content -->
</div>
