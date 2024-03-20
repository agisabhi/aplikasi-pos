@extends('layout.mainlayout')
@section('container')

    <main id="main-container">
        <!-- Hero -->
        <div class="bg-body-light">
          <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
              <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-2">
                  Add new Menu
                </h1>
                <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                  
                </h2>
              </div>
              <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                  <li class="breadcrumb-item">
                    <a class="link-fx" href="/menu">Menu</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    Add new Menu
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>


    <div class="content">
        
      <!-- Labels on top -->
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">New Menu</h3>
            </div>
            <div class="block-content block-content-full">
              <div class="row">
                <div class="col-lg-4">
                  <p class="fs-sm text-muted">
                    
                  </p>
                </div>
                <div class="col-lg-12 space-y-5">
                  @livewire('create-menu')

                </div>
              </div>
            </div>
          </div>
          <!-- END Labels on top -->
    </div>
    <script>
        function submit() {
            document.getElementById("clk").disabled = true;
        }
    </script>

@endsection