<!-- resources/views/frontend/bkash/fail.blade.php -->
@extends('User.layout.master')
@section('user')
<div class="container mt-5">
    <div class="alert alert-danger">
        <strong>Error!</strong> {{ $errorMessage }}
    </div>
</div>
@endsection
