@extends('layouts.new_layouts.master')
@section('content')
<div class="content" style="min-height: 500px">
    <div class="row">
        @foreach ($ab as $item)
            
        
        <div class="col-xl-3">
            <div class="block block-rounded bg-transparent">
                                
            </div>
        </div>
        <div class="col-xl-6" >
            <div class="block-content text-center" >
                <h1 style="margin-top: 20px">{{ $item->judul }}</h1>
            </div>
            <div class="mb-50" style="margin-bottom: 50px; margin-top: 50px">                
                <p>{!! $item->konten !!}</p>
            </div>
        </div>
        @endforeach
    </div>    
</div>
@endsection