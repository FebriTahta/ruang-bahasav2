@extends('layouts.new_layouts.master')

@section('head')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs4.css') }}">
@endsection
 
@section('content')
<div class="w3l-homeblock2 w3l-homeblock6 py-5">
    <div class="container-fluid px-sm-5 py-lg-5 py-md-4">
        <!-- block -->
            <h3 class="section-title-left mb-4"> SUNTING PERTANYAAN ({{ auth()->user()->name }})</h3>
        <div class="row">
            <div class="col-lg-6" style="margin-bottom: 20px">
                <div class="bg-clr-white">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5 card-body blog-details align-self">
                            <span class="label-blue">SUNTING PERTANYAAN</span>
                            <a class="blog-desc">{{ $data_kuis->mapel->mapel_name }} | {{ $data_kuis->kelas->kelas_name }}
                            </a>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Quis
                                vitae sit.</p> --}}
                            <div class="author align-items-center mt-3">
                                <img 
                                    @if ($data_kuis->user->profile->photo==null)
                                        src="{{ asset('assets/assets/images/a1.jpg') }}"
                                    @else
                                    src="{{ asset('photo/'.$data_kuis->user->profile->photo) }}"
                                    @endif alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <a >{{ $data_kuis->user->name }}</a> 
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value"> Guru </span>. <span class="meta-value ml-2 fa fa-check"> pemilik latihan soal</span>
                                    </li>
                                </ul>                                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            {{-- <a>
                                <img class="card-img-bottom d-block radius-image-full" src="{{ asset('kursus_picture/'.$data_kursus->kursus_pict) }}" style="min-height: 263px" alt="Card image cap">
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" style="margin-bottom: 20px">
                <div class="bg-clr-white" style="min-height: 233px; max-height: 233px;">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11 blog-details align-self card-body ml-20">                        
                        <span class="label-blue">{{ $data_kuis->judul }} </span>
                        <p class="blog-desc" style="padding: 5px; margin-top: 10px" >{{ $data_kuis->keterangan }}</p>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-4 trending" style="margin-top: 50px">
            <div class="topics">                                        
                <a class="topics-list mt-3 hover-box">
                    <div class="bg-clr-white" style="padding: 5%">                  
                        <h4> TOTAL :  <u>{{ count($data_kuis->soalurai) }}</u> PERTANYAAN</h4>
                    </div>
                </a><br>
                <a class="topics-list mt-3 hover-box">
                    <div class="bg-clr-white text-danger" style="padding: 5%">                            
                        <div class="left-right">
                            <p class="blog-desc jam text-bold" id="jam" ></p>
                            <p class="blog-desc waktu" id="waktu"> </p>
                        </div>
                        <h4 class="text-danger">catatan</h4><br>
                        <h4 class="text-danger"><small> Hanya (pemilik / guru yang membuat soal) dapat mengubah pertanyaan pada soal tersebut</small></h4>
                    </div>
                </a> 
            </div>                            
        </div>
        <div class="col-lg-8 trending">
            <div class="left-right bg-clr-white p-3" style="margin-top: 50px;">
                <div class="block-content">
                    <h5 class="text-center border-bottom" style="padding: 10px">
                        DETAIL LATIHAN SOAL
                    </h5>
                    <form action="{{ route('updateSoalsU') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form" style="padding: 20px">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $data_1->id }}">
                                <input type="hidden" name="uraian_id" value="{{ $data_1->uraian_id }}">
                                <textarea id="js-summernote" class="js-summernote form-control" name="soaluraian" required>
                                    {!! $data_1->soaluraian !!}
                                </textarea>
                            </div>
                            
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-outline-primary text-right"> ok</button>
                            </div>
                        </div>
                    </form>                                    
                </div>                                   
            </div>   
        </div>

    </div>
</div>
@endsection