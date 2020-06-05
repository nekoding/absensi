@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                   Admin control panel
               </div>
               <div class="card-body">
                    <ul class="nav nav-tabs mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.checkin') }}">Check in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.checkout') }}">Check out</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users') }}">List user</a>
                        </li>
                    </ul>
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Check out</th>
                                <th>Alamat Ip</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Lampiran</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection

@push('datatables')
<script>
    $(function(){
        $('#dataTable').DataTable({
            processing: true,
            serverside: true,
            ajax: '{{ route('data.checkout') }}',
            columns:[
                { "data": null,"sortable": true, 
                    render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                {data: 'name'},
                {data: 'created_at',"sortable": false},
                {data: 'ip_address'},
                {data: 'state'},
                {data: 'city'},
                {data: 'report_link'}
            ]
        });
    });
</script>
@endpush

