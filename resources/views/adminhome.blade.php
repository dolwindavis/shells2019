@extends('layouts.admin')
@section('title','SHELLS2k19 | Admin')

@section('content')

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8" style="padding-top: 5px;">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <span class="h2 font-weight-bold mb-0">350,897</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New users</h5>
                      <span class="h2 font-weight-bold mb-0">2,356</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sales</h5>
                      <span class="h2 font-weight-bold mb-0">924</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">49,65%</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-light ls-1 mb-1">Publish Results</h6>
                    <h2 class="text-white mb-0">Shells 2K19</h2>
                </div>
                <div class="col">
                    <select name="" id="">
                        <option value="">DeepWeb</option>
                        <option value="">AgentX</option>
                        <option value="">NavBot</option>
                    </select>
                </div>
                <div class="col">
                <select name="" id="">
                        <option value="">Round 1</option>
                        <option value="">Round 2</option>
                        <option value="">Round 3</option>
                    </select>
                </div>
                <div class="col">
                    <p style="display: inline-block; margin-bottom: 3px;">Group</p>
                    <label class="custom-toggle" style="margin-bottom: 0px;">
                        <input type="checkbox" checked>
                        <span class="custom-toggle-slider rounded-circle"></span>
                    </label>
                    <p style="display: inline-block;margin-bottom: 3px;">Individual</p>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="number" placeholder="Number" class="form-control" />
                    </div>
                </div>
                <div class="col">
                <button class="btn btn-icon btn-3 btn-primary" type="button">
                    
                    <span class="btn-inner--text">Publish</span>
                    
                </button>
                </div>
              </div>
            </div>
            <div class="card-body">
                <!-- PUblish Results -->
            <form>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" placeholder="Regular" class="form-control" disabled />
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-4">
                        <input class="form-control" placeholder="Birthday" type="text">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group has-success">
                        <input type="text" placeholder="Success" class="form-control is-valid" />
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group has-danger">
                        <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                    </div>
                    </div>
                </div>
                <button class="btn btn-icon btn-3 btn-primary" type="button">
                    
                    <span class="btn-inner--text">Publish</span>
                    
                </button>
                </form>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Publish News</h6>
                  <h2 class="mb-0">Shells 2K19</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="text-align: center;">
                <!-- Publish News -->
              <form>
                    <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Title">
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" placeholder="Date" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Markup"></textarea>              
                    </div> 
                    <button class="btn btn-icon btn-3 btn-primary" type="button" style="margin-top: 40px;">
                        
                        <span class="btn-inner--text">Publish</span>
                    
                    </button>
                </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      
        
      <!-- Footer -->

    </div>
  </div>

@endsection
