@extends('layouts.new_layouts.master')
@section('head')
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/assets/css/fab.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection
@section('content')
<div class="w3l-homeblock2 w3l-homeblock6 py-5">
    <div class="container-fluid px-sm-5 py-lg-5 py-md-4">
        <div class="left-right">
            <small id="jam"></small>
            <small id="waktu"></small>
        </div>
        @if (Session::has('pesan-peringatan'))
                <div class="alert alert-warning text-bold">{{ Session::get('pesan-peringatan') }}</div>                
        @endif
        @if (Session::has('pesan-info'))
            <div class="alert alert-info text-bold">{{ Session::get('pesan-info') }}</div>
        @endif
        <div class="row">
            <div class="col-lg-6 mb-50">
                <div class="bg-clr-white">
                    <div class="row">
                        <div class="col-sm-6 position-relative">
                            <a>
                                <img class="card-img-bottom d-block radius-image-full" src="{{ asset('kursus_picture/'.$data_kursus->kursus_pict) }}" style="min-height: 263px" alt="Card image cap">
                            </a>
                        </div>
                        <div class="col-sm-6 card-body blog-details align-self">                            
                            <span class="label-blue hover-box">
                                @if ($data_kursus->status=='aktif')
                                    <form action="{{ route('nonaktifkan') }}" method="POST">@csrf
                                        <input type="hidden" name="id" value="{{ $data_kursus->id }}">
                                        <input type="hidden" name="status" value="nonaktif">
                                        <button class="btn btn-sm text-uppercase text-primary" @if (auth()->user()->role=='siswa') disabled @endif type="submit">{{ $data_kursus->status }}</button>
                                    </form>                                        
                                @else
                                    <form action="{{ route('aktifkan') }}" method="POST">@csrf
                                        <input type="hidden" name="id" value="{{ $data_kursus->id }}">
                                        <input type="hidden" name="status" value="aktif">
                                        <button class="btn btn-sm text-uppercase text-danger" @if (auth()->user()->role=='siswa') disabled @endif type="submit">{{ $data_kursus->status }}</button>
                                    </form>
                                @endif
                            </span>
                            <a class="blog-desc">{{ $data_kursus->mapel->mapel_name }} | {{ $data_kursus->kelas->kelas_name }}
                            </a>
                           
                            <div class="author align-items-center mt-3">
                                <img 
                                    @if ($data_kursus->user->profile->photo==null)
                                        src="{{ asset('assets/assets/images/a1.jpg') }}"
                                    @else
                                    src="{{ asset('photo/'.$data_kursus->user->profile->photo) }}"
                                    @endif alt="" class="img-fluid rounded-circle">
                                <ul class="blog-meta">
                                    <li>
                                        <a >{{ $data_kursus->user->name }}</a> 
                                    </li>
                                    <li class="meta-item blog-lesson">
                                        <span class="meta-value">Guru </span>. <span class="meta-value ml-2"><span class="fa fa-check"></span></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 trending mt-lg-0 mt-5 mb-20" style="margin-top: 15px">
                <div class="topics">                    
                    <a class="topics-list hover-box" onclick="videoscroll()">
                        <div class="list1">
                            <span class="fa fa-play"></span>
                            <h4><u>{{ $data_kursus->video->count() }}</u> Materi Video</h4>
                        </div>
                    </a>
                    <a class="topics-list mt-3 hover-box" onclick="artikelscroll()">
                        <div class="list1" >
                            <span class="fa fa-book"></span>
                            <h4><u>{{ $data_kursus->artikel->count() }}</u> Artikel & Buku</h4>
                        </div>
                    </a>
                    <a  class="topics-list mt-3 hover-box" onclick="kuisscroll()">
                        <div class="list1">
                            <span class="fa fa-pencil-square"></span>
                            <h4><u>{{ $data_kursus->kuis->count() + $data_kursus->uraian->count() }}</u> Latihan Soal</h4>
                        </div>
                    </a>
                    <a @if (auth()->user()->role=='siswa') @else href="{{ route('detailsiswa',$data_kursus->slug) }}" @endif  
                        class="topics-list mt-3 hover-box">
                        <div class="list1">
                            <span class="fa fa-pie-chart"></span>
                            <h4><u>{{ $data_kursus->profile->count() }}</u> Siswa</h4>
                        </div>
                    </a>
                </div>                            
            </div>
            <div class="col-lg-12 trending mt-lg-0 mt-5 py-lg-5" style="margin-top: 15px">
                <div class="mt-4 left-right bg-clr-white p-3">
                    <h5 class="section-title-left align-self pl-2 mb-sm-0 mb-3">Forum {{ $data_kursus->mapel->mapel_name }} | {{ $data_kursus->kelas->kelas_name }} </h5>
                    <a class="btn btn-style btn-primary" href="/forums-daftar-pertanyaan/premium/{{ $data_kursus->kelas->slug }}/{{ $data_kursus->mapel->slug }}">KUNJUNGI FORUM</a>
                </div>   
            </div>
        </div>
        <div class="w3l-homeblock2 w3l-homeblock5 py-5">
            <div class="container py-lg-5 py-md-4">
                <!-- block -->
                <div class="left-right">
                    <h3 class="section-title-left mb-sm-4 mb-2"> PESERTA DIDIK</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bg-clr-white hover-box" style="max-height: 150px; margin-bottom: 10px">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11 card-body blog-details align-self" >
                                    <div class="author align-items-center">
                                        <img @if($profiles->photo===null) src="{{ asset('assets/assets/images/a1.jpg') }}" @else src="{{ asset('photo/'.$profiles->photo) }}" @endif alt="" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <a href="/data-peserta-didik/{{ $data_kursus->slug }}/{{ $profiles->id }}">{{ $profiles->user->name }}</a> 
                                            </li>
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"> @if($profiles->alumni==null) belum mengisi profile @else{{ $profiles->alumni }} @endif </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php  $nilais = App\Nilaiurai::where('user_id', auth()->user()->id)
                                                        ->where('profile_id', $profiles->id)
                                                        ->where('uraian_id', $urai->id)->sum('nilaiurai');
                               $nilai = App\Nilaiurai::where('user_id', auth()->user()->id)
                                                        ->where('profile_id', $profiles->id)
                                                        ->where('uraian_id', $urai->id)->get();
                                                        ?>
                        <div class="w3l-homeblock2 w3l-homeblock6 " id="daftarvideo">
                            <div class="container-fluid px-sm-5 py-lg-5 py-md-4 mb-200">
                                <div class="js-filter" data-speed="400">
                                    <div class="bg-clr-white hover-box" style="margin-bottom: 10px; margin-top:10px;" data-category="uraian">
                                        <div class="row">
                                            <div class="col-12" style="padding: 10%">
                                                @if ($nilais==0)
                                                    <div class="text-center text-uppercase"><h2>" {{ $urai->judul }} " <p> BELUM DINILAI</p></h2></div><hr>
                                                @else
                                                    <div class="text-center text-uppercase"><h2>" {{ $urai->judul }} " <br><span class="badge badge-primary">  {{ $nilais }} </span></h2></div><hr>
                                                @endif

                                                @if ($nilais==0)
                                                <?php $max = (100 / $jawaban_uraian->count());?>
                                                <input type="hidden" id="jumlah_jawab" value="{{ $jawaban_uraian->count() }}">
                                                
                                                <form action="{{ route('berinilai') }}" method="POST">@csrf
                                                    <h5 class="text-uppercase"></h5>
                                                    <?php $notifnilai = App\Notifurai::where('user_id', auth()->user()->id)->where('uraian_id', $urai->id)->where('profile_id', $profiles->id)->first();?>
                                                    <input type="hidden" name="notifurai" value="{{ $notifnilai->id }}">
                                                    <input type="hidden" name="dinilai" value="1">
                                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                    <input type="hidden" name="profile_id" value="{{ $profiles->id }}">
                                                    <input type="hidden" name="uraian_id" value="{{ $urai->id }}">
                                                    @foreach ($jawaban_uraian as $key=>$item)
                                                        <div class="form-group text-bold">
                                                            <span> #{{ $key+1 }} . </span> <label>{!! $item->soalurai->soaluraian !!}</label>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 10px"><hr>
                                                            <span>JAWAB No : {{ $key+1 }}</span>
                                                            {!! $item->jawabanuraian !!}
                                                            <span class="badge badge-primary"> #NILAI No : {{ $key+1 }}
                                                                <input type="hidden" name="soalurai_id[]" value="{{ $item->soalurai->id }}">
                                                                <input type="hidden" name="jawaburai_id[]" value="{{ $item->id }}">
                                                                <input type="number" class="form-control" name="nilaiurai[]" id="nilai{{ $key }}" placeholder="maksimal {{ $max }} poin " max="{{ $max }}" required>
                                                            </span>
                                                        </div><hr>
                                                    @endforeach
                                                    <div class="form-group">
                                                        <button class="submit btn btn-outline-primary float-right"> SUBMIT NILAI </button>
                                                    </div>
                                                </form>
                                                @else
                                                    @foreach ($nilai as $key=>$item)
                                                        <div class="form-group border-bottom">
                                                            <label for="">#{{ $key+1 }}</label><br>
                                                            <label for="">{!! $item->soalurai->soaluraian !!}</label><br>
                                                            <span class="badge badge-primary">JAWAB</span> <span class="badge badge-success">{{ $item->nilaiurai }}</span><br>
                                                            <label>{!! $item->jawaburai->jawabanuraian !!}</label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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

@section('script')

@endsection