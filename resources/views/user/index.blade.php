@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6>Pengguna</h6>
        <div class="d-flex justify-content-end align-items-center">
            <select class="form-control mr-1 w-25" id="pageLength">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <input type="text" id="search" class="form-control mr-1" placeholder="Pencarian">
            <button class="btn btn-primary" id="add_button">
                Tambah
            </button>
        </div>
    </div>
    <div class="card-body">
        <table class="table" id="init-table">
            <thead class="" width="100%">
                <tr>
                    <th>#</th>
                    <th width="30%">Nama</th>
                    <th width="30%">Email</th>
                    <th width="20%">NIK</th>
                    <th width="20%">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@include('user.modal')
@endsection

@push('script')
    @include('user.script')
    @include('user.script-table')
@endpush
