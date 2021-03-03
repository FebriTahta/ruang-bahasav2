@extends('layouts.new_layouts.master')

@section('head')
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/summernote/summernote-bs4.css') }}">
@endsection
 
@section('content')
<div class="content">
    @if (Session::has('pesan-bahaya'))
        <div class="alert alert-danger text-bold">{{ Session::get('pesan-bahaya') }}</div>                
        @endif
        @if (Session::has('pesan-peringatan'))
                <div class="alert alert-warning text-bold">{{ Session::get('pesan-peringatan') }}</div>                
        @endif
        @if (Session::has('pesan-info'))
            <div class="alert alert-info text-bold">{{ Session::get('pesan-info') }}</div>
        @endif
    <div class="w3l-homeblock2 w3l-homeblock6 py-5">
        <div class="container-fluid px-sm-5 py-lg-5 py-md-4">
            <!-- block -->
                <h3 class="section-title-left mb-4"> Form Latihan Soal ({{ auth()->user()->name }})</h3>
            <div class="row">
                <div class="col-lg-6" style="margin-bottom: 20px" >
                    <div class="bg-clr-white" style="min-height: 233px; max-height: 233px;">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-5 card-body blog-details align-self">
                                <span class="label-blue">Latihan Soal</span>
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
                                            @if (auth()->user()->role=='instruktur')
                                                <a>{{ $data_kuis->user->name }}</a> 
                                            @else
                                                <a>{{ $data_kursus->user->name }}</a>
                                            @endif                                        
                                        </li>
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value"> Guru </span>. @if(auth()->user()->role=='instruktur')<span class="meta-value ml-2 fa fa-check">owner latihan soal</span>@endif
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
                        <div class="align-self card-body ml-10">
                            <span class="label-blue">{{ $data_kuis->judul }} </span>
                            <p class="blog-desc" style="padding: 5px; margin-top: 10px" >{{ $data_kuis->keterangan }}</p>
                        </div>
                    </div>
                </div>
                @if (count($data_result)>0)
                <div class="col-lg-4 trending" style="margin-top: 50px">
                    <div class="bg-clr-white text-uppercase" style="padding: 5%">                    
                        <h2 class="text-primary">TOTAL : {{ $data_kuis->soalurai->count() }} SOAL</h2>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>Latihan#</th>
                                    <th class="text-right">nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil as $key=>$item)
                                <tr>
                                    <td>#{{ $key+1 }}</td>
                                    <td class="text-right"><a href="/detail-nilai/{{ $data_kuis->slug }}/{{ $item->ke }}/{{ auth()->user()->id }}/{{ $data_kursus->slug }}" @if($item->nilai < 70) class="badge badge-danger" @else class="badge badge-primary" @endif> {{ $item->nilai }} </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <?php $menjawab = App\Jawaburai::where('user_id', $data_kursus->user->id)
                                                           ->where('profile_id', auth()->user()->profile->id)
                                                           ->where('uraian_id', $data_kuis->id)
                                                           ->first();
                      $nilais = App\Nilaiurai::where('user_id', $data_kursus->user->id)
                                            ->where('profile_id', auth()->user()->profile->id)
                                            ->where('uraian_id', $data_kuis->id)->sum('nilaiurai')
                ?>
                
                    <div class="col-lg-4 trending" style="margin-top: 50px">
                        <div class="bg-clr-white text-uppercase text-center" style="padding: 5%">                    
                            <h2 class="text-primary">TOTAL : {{ $data_kuis->soalurai->count() }} SOAL</h2>
                        </div>
                        @if ($nilais!==0)
                        <div class="bg-clr-white text-uppercase text-center" style="padding: 5%; margin-top: 20px;">                    
                            <h2 class="text-primary">" {{ $nilais }} "</h2>
                        </div>
                        @endif
                        
                        @if ($menjawab !== null)
                        <div class="bg-clr-white text-uppercase" style="padding: 5%; margin-top: 20px;">
                            @if ($nilais==0)
                            <h2 class="text-primary">NILAI : BELUM DINILAI</h2>
                            @endif
                            
                            <?php $nilai = App\Nilaiurai::where('user_id', $data_kursus->user->id)
                                                        ->where('profile_id', auth()->user()->profile->id)
                                                        ->where('uraian_id', $data_kuis->id)->get();
                                                        ?>
                                                        
                            @foreach ($nilai as $key=>$item)
                            <div class="form-group">
                                <span class="badge badge-primary">NILAI #{{ $key+1 }}
                                    <input type="text text-primary" value="{{ $item->nilaiurai }}" readonly>
                                </span><br><br>
                                {{-- <label class="">#{{ $key+1 }}. {!! $item->jawaburai->jawabanuraian !!}</label> --}}
                            </div><hr>
                            @endforeach
                        </div>
                        @endif
                    </div>
                @endif
                <div class="col-lg-8 trending">
                    <div class="left-right bg-clr-white p-3" style="margin-top: 50px;">
                        <div class="block-content">
                            <h5 class="text-center border-bottom" style="padding: 10px">
                                LATIHAN SOAL URAIAN
                            </h5>
                            <?php $menjawab = App\Jawaburai::where('user_id', $data_kursus->user->id)
                                                           ->where('profile_id', auth()->user()->profile->id)
                                                           ->where('uraian_id', $data_kuis->id)
                                                           ->first();?>
                            @if ($menjawab==null)
                            <div class="form">
                                <form action="{{ route('submit-kuis-uraian') }}" method="POST">@csrf
                                    <?php $i=1 ?>
                                    <input type="hidden" name="user_id" value="{{ $data_kursus->user->id }}">
                                    <input type="hidden" name="profile_id" value="{{ auth()->user()->profile->id }}">
                                    <input type="hidden" name="uraian_id" value="{{ $data_kuis->id }}">
                                    <input type="hidden" name="kursus_id" value="{{ $data_kursus->id }}">
                                    @foreach ($data_pertanyaan as $pertanyaan_item)
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-group ml-10 mt-10">
                                                    <strong># <?=$i?>.<br /></strong>
                                                    <input type="hidden" name="soalurai_id[]" value="{{ $pertanyaan_item->id }}">
                                                    <div class="pertanyaan" style="margin-left: 35px" style="max-width: 500px">
                                                        {!! $pertanyaan_item->soaluraian !!}

                                                        <br><br><br><textarea name="jawabanuraian[]" id="jawabanuraian" class="js-summernote" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $i++ ?>
                                    @endforeach
                                    <div class="form-group  text-right">
                                        <button type="submit" class="btn btn-outline-primary">submit</button>
                                    </div>                                
                                </form>
                            </div>
                            @else
                                <?php $dijawab = App\Jawaburai::where('user_id', $data_kursus->user->id)->where('profile_id', auth()->user()->profile->id)->where('uraian_id', $data_kuis->id)->get()?>
                                @foreach ($dijawab as $key=>$item)
                                <div class="row">
                                    <div class="form-group ml-10 mt-10">
                                        <strong>#{{$key+1 }}</strong>
                                        <p>{!! $item->soalurai->soaluraian !!}</p>
                                        {{-- @foreach ($item->jawaburai as $items) --}}
                                            <span class="badge badge-primary">#jawabanku</span><br>
                                            <label>{!! $item->jawabanuraian !!}</label>
                                        {{-- @endforeach --}}
                                    </div>
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
@endsection