@extends('layouts.admin')
@section('title','SHELLS2k19 | Admin')

@section('content')

<script>
function confirmation(event){
  
  event.preventDefault();
  

    Swal.fire({
    title: 'Care Before Pay',
    html: 'If You Complete Your Payment You can not add new Students Or  Add new Events ',
    type: 'warning',
    width: 600,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Continue',
    padding: '3em',
    background: '#fff url(/images/trees.png)',
    backdrop: `
      rgba(0,0,123,0.4)
      url("/img/nyan-cat.gif")
      center left
      no-repeat
      `,
  }).then((result) => {
    if (result.value) {

      var x=document.getElementById('payment');
      x.submit();

    }
    else{

      return false;
      
    }
  })
}
</script>

@if (session('sucess'))
<script>
  Swal.fire(
  'Payment Done Successfully',
  '#GameOn!',
  'success'
)
</script>
@endif
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
                                <input type="hidden" value="{{$college->user_id}}" name="collegeid">
                                <button type="submit" class="btn btn-lg btn-danger"> <i class="fa fa-trash"></i> </button> 
                              </form>
                            </div>
                            <div class="col">
                                @if($college->payment == 0)
                                  <form action='/admin/payment' method='post' id="payment" onsubmit="confirmation(event);">
                                  @csrf
                                    <input type="hidden" value='{{ $college->user_id }}' name="userid">
                                    <button type="submit" class="btn btn-lg btn-danger"><i class="fas fa-rupee-sign"></i></button> 
                                  </form>
                                @else
                                  <button type="button" class="btn btn-lg btn-danger" disabled><i class="fas fa-rupee-sign"></i></button> 
                                @endif
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
