@extends('layouts.main')
@section('title','SHELLS2k19 | HOME')

@section('content')

  @if (session('message'))
  <script>
  Swal.fire(
  'Sign Up Successful!',
  'Please Check Your Email!',
  'success'
)
  </script>
@endif
  <!-- carosel -->
<div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     
    </ol>
    
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100"  src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/slide1.jpg
  " alt="First slide">
      </div>
      <!-- <div class="carousel-item">
        <img class="d-block w-100" src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/slide3.jpg
  " alt="Second slide">
      </div> -->
     
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- end of carosel -->
  <!-- card  -->
  <div class="container  move-top card-2 border-r-sm">
    <div class="row bg-white border-r-sm" >
      <div class="col-md-9 p-5 " id="">
       <h2 ><b style="font-weight: 400;">About</b> Shells</h2>
       <p >
         <strong>SHELLS,</strong> A National Level Inter-Collegiate IT fest is a fusion of technology and accomplishments. It is an endeavour to achieve the College's vision of preparing its students to become future leaders by providing them Excellence through Education, Exposure and Experience. The Enthusiastic students of KERNEL (Kristu Jayanti Education Resource Networking Enhanced Learning) hereby presents Shells 2k19. Come exhibit your ability, and discover your inexhaustible potential and technical expertise.
       </p>
  
      </div>
      <div class="col-md-3  border" id="" style="max-height: 400px; overflow-y: scroll;">
        <h4 class="border-bottom border-primary mt-1">News</h4>

        @foreach($news as $new)
        <div class="news" style="border-bottom: solid 1px #ddd;">
          <a href="{{ url('news/'.$new->slug) }}" style="text-decoration: none; color: #565656;">
            <h4 style="font-family: Times New Roman; font-weight: 900; margin-bottom: 2px; line-height: 20px; margin-top: 2px;">{{$new->title}}</h4>
            <p style="margin-top: -8px;">{{$new->date}}</p>
          </a>
        </div>
        @endforeach
        <div class="news" style="border-bottom: solid 1px #ddd;">
          <a href="{{ url('news/trailer') }}" style="text-decoration: none; color: #565656;">
            <h4 style="font-family: Times New Roman; font-weight: 900; margin-bottom: 2px; line-height: 20px; margin-top: 2px;">SHELLS 2K19 TRAILER OUT</h4>
            <p style="margin-top: -8px;">25/2/2019</p>
          </a>
        </div>

      </div>
    </div>
  
  
  <!-- college contents -->
  
    <div class="row ">
    <div class="col-md-6" style="padding-left: 0;">
      <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/slide3.jpg" style="width: 100%;height: 100%; object-fit: cover; object-position: left;" >
    </div>
    <div class="col-md p-5  sl-left  text-dark mv-top box">
      <h2 class="text-left border-bottom border-primary"><b style="font-weight: 400;">About</b> College</h2>
       <strong>
       <p class="text-left">
         Kristu Jayanti College, founded in 1999, is managed by "BODHI NIKETAN TRUST", formed by the members of St. Joseph Province of the Carmelites of Mary Immaculate (CMI). The college is affiliated to Bangalore University and is reaccredited with highest grade 'A' by NAAC in Second Cycle of Accreditation. The college is recognized by UGC under the category 2(f) & 12(B). The college was accorded autonomous status from 2013 by the University Grants Commission, Government of Karnataka & the Bangalore University.
       </p>
     </strong>
    </div>
    </div>
  
  <!-- about college end-->
  <!-- about dept -->
  
    <div class="row border-r-sm">
      
    <div class="col-md-6 " style="padding-left:  0;">
      <img src="https://s3.ap-south-1.amazonaws.com/shells2k19/website/images/home/dept.JPG" class="border-r-sm" style="width: 100%;height: 100%; object-fit: cover; object-position: right;" >
    </div>
    <div class="col-md-6 p-5  sl-left-2  text-dark mv-top box">
      <h2 class="text-left border-bottom border-primary"><b style="font-weight: 400;">About</b>  Department</h2>
       <p class=" mt-1">
        Kristu Jayanti College offers MCA & MSc Computer science with the intention to produce competitive computer professionals in tune with advanced technical concepts.The main objective of the programme is to develop the desire to pursue continued professional development by seeking out knowledge and experience beyond the classroom.The focused training given on these topics helps the students to adapt themselves to the growing demand of modern IT Industry. Students work in an integrated environment that enables them to access the resources effectively for their academic and research oriented purposes.
      </p>
      
    </div>
    </div>
  </div>
  <!-- about dept end-->  
@endsection

