@extends('layouts.admin_layouts.master')

@section('content')
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url({{ asset('assets/media/photos/photo34@2x.jpg') }});">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pb-10">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">ABOUT US</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp"></h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
 
    <div class="content">
        <div class="col-12">
            <div class="content-heading"><label>DAFTAR PROFILE / ABOUT US</label></div>            
                @if (Session::has('pesan'))
                    <div class="alert alert-info text-bold">{{ Session::get('pesan') }}</div>
                @endif
                @if (Session::has('pesan-peringatan'))
                    <div class="alert alert-warning text-bold">{{ Session::get('pesan-peringatan') }}</div>
                @endif
                @if (Session::has('pesan-bahaya'))
                    <div class="alert alert-danger text-bold">{{ Session::get('pesan-bahaya') }}</div>
                @endif
                @if (Session::has('pesan-sukses'))
                    <div class="alert alert-success text-bold">{{ Session::get('pesan-sukses') }}</div>
                @endif            
            <!--end alert-->

            
            {{-- <button class="btn btn-outline-info fa fa-plus mb-10" data-toggle="modal" data-target="#modal-fromright_book"> UPLOAD</button> --}}
            <div class="block block-rounded">
                <a href="{{ route('aboutCr') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> NEW ABOUT US</a>
                <div class="block-header block-header-default">
                    <div class="block-content text-center">
                        DAFTAR PROFILE / TENTANG KAMI
                    </div>
                </div>
                <div class="block-content">
                    <table table class="table table-stripped" id="table_book_kursus">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>JUDUL</th>
                                <th>UPLOADER</th>
                                <th>STATUS</th>
                                <th class="text-right">OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ab as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-right">
                                    <a href="{{ route('aboutEd', $item->id) }}" class="btn btn-sm btn-primary" style="width: 80px">edit</a>
                                    <form action="{{ route('aboutDl', $item->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <button type="submit" style="width: 80px" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger" style="width: 60px"> Hapus</button>
                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach                                                        
                        </tbody>
                    </table>                    
                </div>                
            </div>
                 
        </div>
    </div>

    
    {{-- modal hapus --}}
    <div class="modal fade" id="modal-fromleft-remove" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
        <div class="modal-dialog modal-dialog-fromleft" role="document">                            
            <div class="modal-content">
                <form id="form-tambah-quiz" name="form-tambah-quiz" class="form-horizontal" action="{{ route('hapusBukuPermanen') }}" method="POST" enctype="multipart/form-data">@csrf
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-danger">
                            <h3 class="block-title">HAPUS BUKU</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
    
                        <div class="block-content">                            
                            <div class="form-group">
                                <div class="form-group text-center">
                                    <p class="text-danger">BUKU TERSEBUT AKAN DIHAPUS PERMANEN DARI SISTEM!</p>
                                </div>
                                <div class="col-sm-12 form-group text-center border-bottom">
                                    <input type="hidden" class="form-control" id="id" name="id"
                                        value="" required>
                                    <p>Yakin akan menghapus buku tersebut ?</p>
                                </div>                            
                                <div class="col-sm-4 form-group">
                                    <button class="btn btn-outline-danger fa fa-trash" type="submit"> hapus</button>
                                </div>
                            </div>
                        </div>                                                             
                    </div>                        
                </form>                   
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var table2;
    $(document).ready(function(){    
        table2= $('#table_book_kursus').DataTable({});        
    });
    var table;
    $(document).ready(function(){    
        table= $('#table_book_kursuss').DataTable({});        
    });
</script>

<script>
    $('#modal-fromleft-remove').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)        
        var id = button.data('id')                
        var modal = $(this)
        modal.find('.block-title').text('HAPUS BUKU');        
        modal.find('.block-content #id').val(id);
    })
</script>
@endsection

