@extends('layouts.admin_layouts.master')
@section('content')
    <!-- Hero -->
<div class="bg-image bg-image-bottom" style="background-image: url({{ asset('assets/media/photos/photo34@2x.jpg') }});">
    <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
            <div class="pb-10">
                <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">CREATE ABOUT US BARU</h1>
                <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp"></h2>
            </div>
        </div>
    </div>
</div>
<!-- END Hero -->
<div class="content">
    <div class="content-heading"><label>CREATE PROFILE</label></div>            
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

    <div class="form">
        <form action="{{ route('aboutSv') }}" method="POST" enctype="multipart/form-data"> @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="judul" placeholder="Judul.." required>
            </div>
            <div class="form-group">
                <textarea name="konten" id="js-summernote" class="js-summernote" cols="30" rows="10">
                    Konten..
                </textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><i class="fa fa-save"></i> SAVE</button>
            </div>
        </form>
    </div>
</div>
@endsection