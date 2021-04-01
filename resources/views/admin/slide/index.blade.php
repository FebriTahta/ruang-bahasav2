@extends('layouts.admin_layouts.master')

@section('content')
<!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url({{ asset('assets/media/photos/photo34@2x.jpg') }});">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pb-20">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Slider Management</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Atur tampilan slide yang ditampilkan pada halaman utama!</h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
  
<div class="content row">
    <!--form-->
    <div class="col-12">
        <nav class="breadcrumb push content-heading">
            {{-- <a class="breadcrumb-item" href="be_pages_elearning_courses.html">Courses</a> --}}
            <span class="breadcrumb-item active">Slider Management </span>
        </nav>
        {{-- <h2 class="content-heading breadcumb push">User Management</h2> --}}
        @if (Session::has('pesan-bahaya'))
        <div class="alert alert-danger text-bold">{{ Session::get('pesan-bahaya') }}</div>                
        @endif
        @if (Session::has('pesan-peringatan'))
                <div class="alert alert-warning text-bold">{{ Session::get('pesan-peringatan') }}</div>                
        @endif
        @if (Session::has('pesan-sukses'))
            <div class="alert alert-info text-bold">{{ Session::get('pesan-sukses') }}</div>
        @endif
    </div>

    <!--end form-->
    <div class="col-md-12">
        <div class="block ">
            <div class="block-header block-header-default">                
                <h3 class="block-title">DAFTAR SLIDER</h3>
            </div>
            
            <div class="block-content">
                <button class="btn btn-primary mb-20" data-target="#modal-fromleft" data-toggle="modal"> Add New Slide</button>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="daftar_user" width="100%" cellspacing="0">
                                                      
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>img</th>
                                <th>nama</th>                                
                                <th>status</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>                   
                            @foreach ($sl as $key => $item)
                                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        {{-- <div class="sidebar-mini-visible-b align-v animated fadeIn"> --}}
                                            <img class="img-avatar img-avatar32" src="{{ asset('upload/users/comp/'.$item->img) }}" alt="">
                                        {{-- </div> --}}
                                    </td>
                                    <td>{{ $item->img }}</td>
                                    <td>
                                        
                                        @if ($item->status==1)
                                        <label class="css-control css-control-success css-switch">
                                            <input data-id="{{ $item->id }}" type="checkbox" class="css-control-input" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $item->status ? 'checked' : '' }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                            <span id="badge{{ $item->id }}" class="badge badge-primary">aktif</span>
                                        @else
                                        <label class="css-control css-control-success css-switch">
                                            <input data-id="{{ $item->id }}" type="checkbox" class="css-control-input" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $item->status ? 'checked' : '' }}>
                                            <span class="css-control-indicator"></span>
                                        </label>
                                            <span id="badge{{ $item->id }}" class="badge badge-danger">non aktif</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                            
                                            <button class="btn btn-sm btn-outline-primary fa fa-pencil" data-toggle="modal" data-target="#modal-fromleft"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-stat="{{ $item->status }}" data-img="{{ asset('upload/users/comp/'.$item->img) }}"></button>
                                            <button class="btn btn-sm btn-outline-danger fa fa-trash" data-toggle="modal" data-target="#modal-fromleftdel"
                                            data-name="{{ $item->name }}" data-id="{{ $item->id }}"></button>
                                    </td>
                                </tr>
                                
                                                          
                            @endforeach
                        </tbody> 
                        
                    </table>
                </div>
            </div>                                              
        </div>
    </div>    
</div>

<!--modal edit user-->
<div class="modal fade" id="modal-fromleft" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">                            
        <div class="modal-content">
            <form id="form-update-user" name="form-update-user" class="form-horizontal" action="{{ route('slideSt') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary">
                        <h3 class="block-title">ADD SLIDE</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">
                        
                        
                        <div class="form-group">
                            <img id="preview_img" src="https://iamindore.com/w3newdesign/w3a/wp-content/uploads/2019/09/No_Image-128.png" style="margin-bottom: 15px" class="" width="200" height="150"/>
                        </div>
                        <div class="form-group">
                            <label for="">Img</label>
                            <input class="form-control" onchange="loadPreview(this);" type="file" id="img" name="img" value="" required>
                        </div>
                        <div class="form-group border-bottom">
                            <input class="form-control" type="hidden" id="id" name="id" value="" required>
                            <label for="">Nama </label>               
                            <input class="form-control" type="text" id="name" name="name" value="" required>                            
                        </div>
                        <div class="form-group">
                            <label for="">Status </label>
                            <select name="status" id="role" class="form-control" required>
                                <option value=""> == pilih status == </option>
                                <option value="1">aktif</option>
                                <option value="0">non aktif</option>
                            </select>
                        </div>
                        <div class="form-group float-right">
                            <button class="btn btn-outline-primary" type="submit">tambahkan</button>
                        </div>                                                                                                               
                    </div>                                                             
                </div>                        
            </form>                   
        </div>            
    </div>
</div>
<!--end modal edit user-->

<!--modal delete user-->
<div class="modal fade" id="modal-fromleftdel" tabindex="-1" role="dialog" aria-labelledby="modal-fromleft" aria-hidden="true">
    <div class="modal-dialog modal-dialog-fromleft" role="document">                            
        <div class="modal-content">
            <form id="form-update-user" name="form-update-user" class="form-horizontal" action="{{ route('slideDl') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-danger">
                        <h3 class="block-title">HAPUS USER</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>

                    <div class="block-content">                            
                        <div class="form-group border-bottom mb-10">
                            <input type="hidden" id="id" name="id">
                            <div class="text-center text-danger">
                                <p>Yakin menghapus slide tersebut ?</p>
                            </div>                            
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-danger" type="submit">HAPUS</button>
                        </div>
                    </div>                                                             
                </div>                        
            </form>                   
        </div>            
    </div>
</div>
<!--end modal delete user-->
@endsection

@section('script')
<script>
    function harusHuruf(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
                return false;
            return true;
    }    
</script>
<script>    
    var table2;
    $(document).ready(function(){    
        table2= $('#daftar_user').DataTable({});        
    });
    
</script>

<script>
    $('#modal-fromleft').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var status = button.data('status')
        var img = button.data('img')
        var modal = $(this)
        modal.find('.block-title').text('Ubah data pengguna');
        modal.find('.block-content #id').val(id);
        modal.find('.block-content #name').val(name);
        modal.find('.block-content #status').val(status);
        modal.find('.block-content #preview_img').attr('src', img);
    })
</script>
<script>
    $('#modal-fromleftdel').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')        
        var modal = $(this)
        modal.find('.block-title').text('HAPUS USER');
        modal.find('.block-content #id').val(id);
        modal.find('.block-content #name').val(name);        
    })
</script>

<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(200)
                      .height(150);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script>
    $(function(){
        $('.css-control-input').change(function(){
            var status = $(this).prop('checked')==true ? 1 : 0;
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('change') }}",
                data: {'status': status, 'id': id},
                success: function(data){
                    console.log(data)
                    if (data==1) {
                        $("#badge"+id).text("aktif").removeClass("badge badge-danger").addClass("badge badge-primary");        
                    } else {
                        $("#badge"+id).text("non aktif").removeClass("badge badge-primary").addClass("badge badge-danger");
                    }
                
                }
            });
        })
    })
</script>
@endsection