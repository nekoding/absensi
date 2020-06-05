@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check in form</div>
                <div class="card-body">
                    <div class="camera">
                        <video id="video">Video stream not available.</video>
                        <button id="startbutton">Take photo</button> 
                      </div>
                      <canvas id="canvas">
                      </canvas>
                      <div class="output">
                        <img id="photo" alt="The screen capture will appear in this box."> 
                    </div>
                    <div id="results"></div>
                    <form action="{{ route('checkout.store') }}" method="post" >
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">Check in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('webcam')
    <script src="{{ asset('js/webcam.js') }}"></script>
@endpush