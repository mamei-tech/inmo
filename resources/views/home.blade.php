@extends('layouts.app')

@section('content')

@php 
    $inHome = true;
@endphp


@include('partials.slider')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                  

                  <?php foreach ($flights as $flight) {    echo $flight->name; }  ?>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection