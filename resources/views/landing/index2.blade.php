@extends('layouts.new_layouts.master')
@section('head')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
/* .mySlides {display:none;} */
.slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto
}

.mySlides {
    display: none;
  height: 400px;  
     
}

.prev,
.next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -22px;
    padding: 16px;
    color: #222428;
    font-weight: bold;
    font-size: 30px;
    transition: .6s ease;
    border-radius: 0 3px 3px 0
}

.next {
    right: -50px;
    border-radius: 3px 3px 3px 3px
}

.prev {
    left: -50px;
    border-radius: 3px 3px 3px 3px
}

.prev:hover,
.next:hover {
    color: #f2f2f2;
    background-color: rgba(0, 0, 0, 0.8)
}

.text {
    color: #f2f2f2;
    font-size: 15px;
    padding-top: 12px;
  padding-bottom: 12px;
    position: absolute;
    bottom: 0;
    width: 100%;
    text-align: center;
    background-color: #222428
}

.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0
}

.dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color .6s ease
}

.active,
.dot:hover {
    background-color: #717171
}
</style>
@endsection
@section('content')
    <div class="content">
        
        <section class="w3l-testimonials py-sm-5 py-4" id="testimonials">
            <!-- main-slider -->
            {{-- <div class="w3-content w3-display-container" style="">
                @foreach ($recent_news as $item)
                <img src="{{ asset('news_picture/'.$item->news_pict) }}" class="mySlides" width="100%" height="500" style="border-radius: 10px">
                @endforeach
                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
            </div> --}}
            
            <div class="slideshow-container position-relative">
                
                    <div class="slideshow-inner">
                    
                        
                    @foreach ($sl as $item)
                  <div class="mySlides">
                   
                    <img  src="{{ asset('upload/users/comp/'.$item->img) }}" style="border-radius: 10px; max-width: 100%; height: 500px" width="100%"  alt="sally lightfoot crab"/>
                                          
                  </div>
                  @endforeach
                  </div>
                 
                
                
                    <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
                    <a class="next" onclick='plusSlides(1)'>&#10095;</a>
                
                  
            </div>
                <br/>
                
                
                <div style='text-align: center; margin-top: 90px'>
                    @foreach ($sl as$key=> $item)
                    <span class="dot" onclick='currentSlide($key+1)'></span>      
                    @endforeach
                </div>
                
                </div>
            
            <div class="testimonials pt-2 pb-5">
                <div class="container pb-lg-5">
                   
                    
                    
                    <div class="owl-testimonial owl-carousel owl-theme mb-md-0 mb-sm-5 mb-4">
                        
                        {{-- <div class="item">
                            <div class="row slider-info">
                                <div class="col-lg-8 message-info align-self">
                                    <span class="label-blue mb-sm-4 mb-3">Study Goal</span>
                                    <h3 class="title-big mb-4">Dapatkanlah materi bergengsi dan jadi juara kelas.
                                    </h3>
                                    <p class="message">Universitas Trunojoyo Madura adalah Perguruan Tinggi Negeri yang terletak di Kabupaten Bangkalan (Madura), Provinsi Jawa Timur. Mengapa kuliah di Universitas Trunojoyo Madura? Selain biaya hidup yang bisa dibilang lebih murah, pulau madura juga terkenal dengan berbagai macam tempat wisata dan tradisinya yang unik.</p>
                                </div>
                                <div class="col-lg-4 col-md-8 img-circle mt-lg-0 mt-4">
                                    <img src="{{ ('assets/media/ui/trunojoyo3.png') }}" class="img-fluid radius-image-full" alt="client image">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row slider-info">
                                <div class="col-lg-8 message-info align-self">
                                    <span class="label-blue mb-sm-4 mb-3">Study Goal</span>
                                    <h3 class="title-big mb-4">Dapatkan kemudahan akses belajar dimanapun dan kapanpun.
                                    </h3>
                                    <p class="message">Anda dapat mengakses seluruh materi dari kami dengan ponsel anda.
                                        Dengan kumudahan mengakses materi belajar membuat anda berada satu langkah didepan lebih siap
                                        dalam menghadapi masa depan.  
                                    </p>
                                </div>
                                <div class="col-lg-4 col-md-8 img-circle mt-lg-0 mt-4">
                                    <img src="{{ ('assets/media/ui/MobileApp.png') }}" class="img-fluid radius-image-full" alt="client image">
                                </div>
                            </div>
                        </div>                         --}}
                    </div>
                </div>
            </div>
            <!-- /main-slider -->
        </section>              

                        
    </div>
    <div class="w3l-homeblock2 w3l-homeblock5 py-5">
        <div class="container py-lg-5 py-md-4">
            <!-- block -->
            <div class="left-right">
                <h3 class="section-title-left mb-sm-4 mb-2"> Guru</h3>
                <a href="{{ route('allinstruktur') }}" class="more btn btn-small mb-sm-0 mb-4">Semua Guru</a>
            </div>
            <div class="row">
                @foreach ($recent_instruktur as $item)
                    <div class="col-lg-4">
                        <div class="bg-clr-white hover-box" style="max-height: 150px; margin-bottom: 10px">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11 card-body blog-details align-self" >
                                    <div class="author align-items-center">
                                        <img @if($item->profile->photo===null) src="{{ asset('assets/assets/images/a1.jpg') }}" @else src="{{ asset('photo/'.$item->profile->photo) }}" @endif alt="" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="{{ route('detailInstruktur',$item->id) }}">{{ $item->name }}</a> 
                                            </li>
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"> @if($item->profile->alumni==null)@else{{ $item->profile->alumni }} @endif </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="w3l-homeblock2 w3l-homeblock5 py-5" >
        <div class="container py-lg-5 py-md-4">
            <!-- block -->
            @if (count($recent_news)!==0)
            <h3 class="section-title-left mb-4"> NEWS </h3>
            @endif
            <div class="row" >
                @foreach ($recent_news as $item)
                <div class="col-lg-6 news " id="news" style="margin-top: 50px" >
                    <div class="hover-box" style="min-height: 280px; background-color: lightblue; border-radius: 30px">
                        <div class="row">
                            <div class="col-sm-6 position-relative" style="min-height: 280px">
                                <a href="{{ route('newsDetail',$item->id) }}" >
                                    <img class="card-img-bottom d-block radius-image-full" style="min-height: 280px" src="{{ asset('news_picture/'.$item->news_pict) }}" alt="Card image cap">
                                </a>
                            </div>
                            <div class="col-sm-6 card-body blog-details align-self">
                                <a href="{{ route('newsDetail',$item->id) }}" class="blog-desc">{{ $item->news_tittle }}
                                </a>
                                <p></p>
                                <div class="author align-items-center mt-3">
                                    <img src="{{ asset('assets/assets/images/a2.jpg') }}" alt="" class="img-fluid rounded-circle">
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="{{ route('newsDetail',$item->id) }}">{{ $item->user->name }} &nbsp; ({{ $item->user->role }})</a> 
                                        </li>
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value"> {{ $item->created_at }} </span>.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // news
    function news()
    {
        var skrollke = document.getElementById("news");
        skrollke.scrollIntoView();
    }
    </script>

{{-- <script>
    var slideIndex = 1;
    showDivs(slideIndex);
    
    function plusDivs(n) {
      showDivs(slideIndex += n);
    }
    
    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
    </script> --}}

    <script>
        var slideIndex = 1;

var myTimer;

var slideshowContainer;

window.addEventListener("load",function() {
    showSlides(slideIndex);
    myTimer = setInterval(function(){plusSlides(1)}, 4000);
  
    //COMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    slideshowContainer = document.getElementsByClassName('slideshow-inner')[0];
  
    //UNCOMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    // slideshowContainer = document.getElementsByClassName('slideshow-container')[0];
  
    slideshowContainer.addEventListener('mouseenter', pause)
    slideshowContainer.addEventListener('mouseleave', resume)
})

// NEXT AND PREVIOUS CONTROL
function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
  
  //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
  
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
  } else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  }
}

//Controls the current slide and resets interval if needed
function currentSlide(n){
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

pause = () => {
  clearInterval(myTimer);
}

resume = () =>{
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
}
    </script>
@endsection