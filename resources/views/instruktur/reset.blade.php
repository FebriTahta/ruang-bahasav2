@extends('layouts.new_layouts.master')
@section('head')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
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
                <div class="row">
                    <div class="col-lg-6" style="margin-bottom: 50px">
                        <div class="bg-clr-white" style="min-height: 270px">
                            <div class="row">                        
                                <div class="col-sm-12 card-body blog-details align-self">
                                    <div class="pad" style="margin-left: 10%">
                                        <p class="blog-desc jam text-bold" id="jam" ></p>
                                        <a class="blog-desc waktu" id="waktu"> </a>                                
                                    </div>                            
                                    <div class="author mt-3" style="margin-left: 10%">
                                        <img 
                                            @if (auth()->user()->profile->photo==null)
                                                src="{{ asset('assets/assets/images/a1.jpg') }}"
                                            @else
                                            src="{{ asset('photo/'.auth()->user()->profile->photo) }}"
                                            @endif alt="" class="img-fluid rounded-circle">
                                        <ul class="blog-meta">
                                            <li>
                                                <a >{{ auth()->user()->name }}</a> 
                                            </li>
                                            <li class="meta-item blog-lesson">
                                                <p>{{ auth()->user()->role }} </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
					$notif = App\Notifurai::where('user_id', auth()->user()->id)->where('dinilai',0)->get();
					?>
                    <div class="col-lg-6">
                        <div class="bg-clr-white" style="min-height: 270px">
                            <div class="col-sm-12 card-body blog-details align-self">
                                <div class="pad" style="margin-left: 10%">
                                    <p class="blog-desc text-bold"> Periksa daftar pengajuan reset hasil kuis!</p>
                                    <p class="text-muted">
                                        ada <u>{{ $notif->count() }} siswa </u> yang menyelesaikan uraian soal dan belum diperiksa
                                    </p><br><br>
                                    <button class="btn btn-sm btn-primary" onclick="daftarsiswa()">daftar siswa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w3l-homeblock2 w3l-homeblock6 " id="daftarvideo">
                    <div class="container-fluid px-sm-5 py-lg-5 py-md-4 mb-200">
                        <div class="js-filter" data-speed="400">
                            <!--filter-->
                            <div class="p-10 bg-white">
                                <div class="block-header border-bottom push">                            
                                    <div class="col-3 col-xl-3 nav nav-pills">
                                        <div class="nav-item text-center" style="width: 100%">                        
                                            <a class="nav-link active" href="#" data-category-link="multi">
                                            <i class="fa fa-fw fa-book mr-5"></i>multi</a>
                                        </div>                    
                                    </div>
                                    <div class="col-3 col-xl-3 nav nav-pills">
                                        <div class="nav-item text-center" style="width: 100%">
                                            <a class="nav-link" href="#" data-category-link="urai">
                                            <i class="fa fa-fw fa-book mr-5"></i>uraian</a>
                                        </div>                    
                                    </div>                                                                              
                                </div>                                              
                            </div>

                            {{-- table --}}
                            <div class="w3l-homeblock2 w3l-homeblock6 py-5" id="daftarakuis" data-category="multi">
                                <div class="container-fluid px-sm-5 py-lg-5 py-md-4">
                                    <div class="bg-clr-white text-center" style="padding: 5%" id="daftarsiswa">
                                        {{-- <a href="#" class="btn btn-primary fa fa-plus hover-box" style="margin-bottom: 10px"> Tambah &nbsp;</a> --}}
                                        {{-- <table class="table table-stripped table-vcenter" id="reset">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th class="d-none d-sm-table-cell" style="width: 5%">#</th>
                                                    <th>siswa</th>
                                                    <th>kuis</th>
                                                    <th class="d-none d-sm-table-cell" style="width: 20%">kursus</th>
                                                    <th class="text-right">opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($resets as $key=> $item)
                                                <tr>
                                                    <td class="d-none d-sm-table-cell" style="width: 5%">{{ $key+1 }}</td>
                                                    <td>{{ $item->profile->user->name }}</td>
                                                    <td>{{ $item->kuis->kuis_name }}</td>
                                                    <td class="d-none d-sm-table-cell" style="width: 20%">{{ $item->kuis->mapel->mapel_name }} {{ $item->kuis->kelas->kelas_name }}</td>
                                                    <td class="text-right">
                                                        <a href="#" class="fa fa-warning btn btn-sm btn-outline-warning text-warning" data-toggle="modal" data-target="#modal-fromleft-reset"
                                                        data-profile_id="{{ $item->profile->id }}" data-kuis_id="{{ $item->kuis_id }}" data-id="{{ $item->id }}"> </a>
                                                        <a class="btn btn-sm btn-outline-primary fa fa-eye" href="/detail-result-siswa/{{ $item->kuis->id }}/{{ $item->profile->id }}"></a>

                                                        </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table> --}}
                                        <h5>UNTUK HASIL NILAI PILIHAN GANDA SILAHKAN CEK UNTUK SETIAP SISWA PADA DAFTAR KURSUS ANDA</h5>
                                    </div>                
                                </div>
                            </div>


                            {{-- <div class="w3l-homeblock2 w3l-homeblock6 py-5" id="daftarakuis2" data-category="urai" style="display: none">
                                <div class="container-fluid px-sm-5 py-lg-5 py-md-4">
                                    <div class="bg-clr-white" style="padding: 5%" id="daftarsiswa">
                                        <div class="w3l-homeblock2 w3l-homeblock5 py-5">
                                            <div class="container py-lg-5 py-md-4">
                                                <!-- block -->
                                                <div class="left-right">
                                                    <h3 class="section-title-left mb-sm-4 mb-2"> PESERTA DIDIK</h3>
                                                </div>
                                                <div class="row">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>                
                                </div>
                            </div> --}}
                            <div class="w3l-homeblock2 w3l-homeblock5 py-5" data-category="urai" style="display: none">
                                <div class="container py-lg-5 py-md-4">
                                    <!-- block -->
                                    <div class="left-right">
                                        <h3 class="section-title-left mb-sm-4 mb-2"> BELUM DINILAI</h3>
                                    </div>
                                    <div class="row">
                                        @foreach ($belum_dinilai as $item)
                                                        <div class="col-lg-4">
                                                            <div class="bg-clr-white hover-box" style="max-height: 150px; margin-bottom: 10px">
                                                                <div class="row">
                                                                    <div class="col-sm-1"></div>
                                                                    <div class="col-sm-11 card-body blog-details align-self" >
                                                                        <div class="author align-items-center">
                                                                            <img @if($item->profile->photo===null) src="{{ asset('assets/assets/images/a1.jpg') }}" @else src="{{ asset('photo/'.$item->profile->photo) }}" @endif alt="" class="img-fluid rounded-circle">
                                                                            <ul class="blog-meta">
                                                                                <li>
                                                                                    <a @if(auth()->user()->role=='siswa') href="#{{ $item->user->name }}" @else href="/data-peserta-didik/{{ $item->kursus->slug }}/{{ $item->profile->id }}" @endif>{{ $item->profile->user->name }}</a> 
                                                                                </li>
                                                                                <li class="meta-item blog-lesson">
                                                                                    <span class="meta-value"> @if($item->profile->alumni==null) belum mengisi profile @else{{ $item->profile->alumni }} @endif </span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-fromleft-reset" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
        <div class="modal-dialog modal-dialog-fromleft" role="document">                            
            <div class="modal-content">
                <form id="form-tambah-quiz" name="form-tambah-quiz" class="form-horizontal" action="{{ route('resetkuis') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">RESET</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>                    
                        <div class="block-content">                            
                            <div class="form-group">                            
                                <div class="block-content text-center">                                
                                    <p>Anda yakin ingin mereset hasil kuis ini ? </p>
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="kuis_id" id="kuis_id">                                
                                    <input type="hidden" name="profile_id" id="profile_id">
                                </div>
                            </div>                        
                            <div class="form-group float-left">
                                <button type="submit" class="btn btn-outline-warning">reset</button>
                            </div>                        
                        </div>                                                             
                    </div>                        
                </form>                   
            </div>
        </div>
    </div>
    <!--end modal ajukan reset-->
@endsection

@section('script')
<script>
    function daftarsiswa()
    {
        var skrollke = document.getElementById("daftarsiswa");
        skrollke.scrollIntoView();
    }
</script>
<script>    
    var table3;
    $(document).ready(function(){    
        table3= $('#reset').DataTable({});        
    });
    var table;
    $(document).ready(function(){    
        table= $('#reset2').DataTable({});        
    });
</script>

<script>
    $('#modal-fromleft-reset').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget) 
    var id = button.data('id')               
    var kuis_id = button.data('kuis_id')
    var profile_id = button.data('profile_id') 
    var modal = $(this)
    modal.find('.block-title').text('RESET HASIL KUIS');
    modal.find('.block-content #id').val(id);    
    modal.find('.block-content #kuis_id').val(kuis_id);    
    modal.find('.block-content #profile_id').val(profile_id);
});
</script>
@endsection