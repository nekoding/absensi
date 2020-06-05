@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Check out form</div>
                <div class="card-body">
                    <form action="{{ route('checkout.store') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="">Link Laporan Kerja</label>
                            <input type="text" name="report_link" class="form-control" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-danger btn-block">Check out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection