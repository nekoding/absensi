@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Absensi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('checkin.store') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-block">Check in</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('checkout.create') }}" class="btn btn-danger btn-block {{ (session('check_in_id')) ?? 'disabled' }} ">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    Laporan absen
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Check in</th>
                                <th>Check out</th>
                                <th>Report</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{  date('H:i | d/m/Y', strtotime($item->check_in)) }} | {{ $item->checkIn_state }}</td>
                                    <td>{{  date('H:i | d/m/Y', strtotime($item->check_out)) }} | {{ $item->checkOut_state }}</td>
                                    <td><a href="{{ $item->report_link }}" target="_blank" rel="noopener noreferrer">{{ $item->report_link }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection