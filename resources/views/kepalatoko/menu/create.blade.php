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
                  <!-- Form Labels on top - Default Style -->
                  <form action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-email">Email</label>
                      <input type="email" class="form-control" id="example-ltf-email" name="example-ltf-email" placeholder="Your Email..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password">Password</label>
                      <input type="password" class="form-control" id="example-ltf-password" name="example-ltf-password" placeholder="Your Password..">
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                  </form>
                  <!-- END Form Labels on top - Default Style -->

                  <!-- Form Labels on top - Alternative Style -->
                  <form action="be_forms_layouts.html" method="POST" onsubmit="return false;">
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-email2">Email</label>
                      <input type="email" class="form-control form-control-alt" id="example-ltf-email2" name="example-ltf-email2" placeholder="Your Email..">
                    </div>
                    <div class="mb-4">
                      <label class="form-label" for="example-ltf-password2">Password</label>
                      <input type="password" class="form-control form-control-alt" id="example-ltf-password2" name="example-ltf-password2" placeholder="Your Password..">
                    </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-dark">Login</button>
                    </div>
                  </form>
                  <!-- END Form Labels on top - Alternative Style -->
                </div>
              </div>
            </div>
          </div>
          <!-- END Labels on top -->
    </div>

@endsection