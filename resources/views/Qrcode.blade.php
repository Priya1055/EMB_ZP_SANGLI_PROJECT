@extends('layouts.header')
<style>
.qr-code-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .qr-code {
            /* Adjust the width and height as needed */
            width: 300px;
            height: 300px;
        }
        </style>
@section('content')
<div class="qr-code-container">
        <!-- <img class="qr-code" src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code"> -->
        {{$qrCode}}
    </div>
@endsection