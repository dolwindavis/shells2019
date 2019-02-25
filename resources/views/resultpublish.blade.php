@extends('layouts.admin')
@section('title','SHELLS2k19 | Admin')

@section('content')


    <!-- Header -->
    <div class="header pb-8 pt-2 pt-md-5">
     
      <div class="container">
         
        <div class="header-body">
          <h1 class="text-center text-white">RESULTS</h1>
          <!-- Card stats -->
          <div class="row">
              <div class="col-md-6" style="margin: 10px auto;">
                <div class="card" style="min-height: 200px; text-align: left;">
                    <div class="card-body">
                        <h1 class="card-title" style="margin-bottom: 0px;">{{$event->name}}</h4>
                        <h5 class="card-title">{{$round}}</h5>

                        <div class="form-group col-md-12" style="padding-left:0px;">
                            <input type="Name" class="form-control" id="inputEmail4" placeholder="Name">
                        </div>


                       <a href="/eventdetails/" class="btn btn-success mt-5"> Publish </a>
                    </div>
                  </div>
                </div>    
          </div>
          

        </div>
      </div>
    </div>

    </div>
  </div>

@endsection
