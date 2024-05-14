@extends('layouts.header')
@section('content')
<br>
<br>
<div class="container mt-4" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-6">
            <h2>Photos</h2>
            <div class="row">
                @foreach($paths as $key => $path)
                    @if(strpos($key, 'photo') === 0 && !empty($path))
                        <div class="col-md-6 mb-3">
                            <img src="{{ $path }}" class="img-fluid" alt="{{ $key }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col-md-6">
            <h2>Documents & Videos</h2>
            <div class="row">
                @foreach($paths as $key => $path)
                    @if((strpos($key, 'doc') === 0 || $key === 'vdo') && !empty($path))
                        <div class="col-md-12 mb-3">
                            @if(strpos($key, 'doc') === 0)
                                <a href="{{ $path }}" class="btn btn-primary" target="_blank">{{ ucfirst($key) }}</a>
                            @elseif($key === 'vdo')
                                <video width="100%" controls>
                                    <source src="{{ $path }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection