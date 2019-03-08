@extends('layouts.admin')
@section('title','SHELLS2k19 | Admin')

@section('content')


    <!-- Header -->
    <div class="header pb-8 pt-2 pt-md-5">
     
      <div class="container ">
         
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
             
              @foreach ($colleges as $college) 
              <div class="col-xl-4 col-lg-4 col-md-4" style="margin-bottom: 20px;">
              
                  <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">College Name</h5>
                          <span class="h2 font-weight-bold mb-0">{{$college->name}}</span> 
                        </div>
                      </div>
                      <div class="row pt-2">
                          <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">College ID</h5>
                            <span class="h4 font-weight-bold mb-0">{{$college->user->username}}</span> 
                          </div>
                        </div>
                      <div class="row pt-2">
                            <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Participant  List</h5>
                              <ol>
                                @foreach ($college->studentDetails as $student)
                                <li>{{ $student->name.' => '.$student->reg_no }}</li>
                                @endforeach
                                  
                              </ol>
                            </div>
                      </div>
                      <div class="row pt-2">
                            <div class="col">
                              <h5 class="card-title text-uppercase text-muted mb-0">Fees</h5>
                              <span class="text-success mr-2">Rs{{ $college->studentfee }} + Rs{{ $college->codingfee }} = {{ $college->totalfee }} </span>
                            </div>
                      </div>
                      <div class="row pt-2">
                            <div class="col">
                            <a href="/registration-form/{{$college->user->id}}" class="btn btn-lg btn-success"> Download Excel</a>
                            </div>
                            <div class="col">
                              <form action="/admin/college/delete" method="post">
                              @csrf 
                                <input type="hidden" value="{{$college->id}}" name="collegeid">
                                <button type="submit" class="btn btn-lg btn-danger"> <i class="fa fa-trash"></i> </button> 
                              </form>
                            </div>
                      </div>
    
    
                    </div>
                  </div>
                </div>
           
            @endforeach
          </div>
          

        </div>
      </div>
    </div>

    </div>
  </div>

@endsection
