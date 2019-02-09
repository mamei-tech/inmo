@extends('layouts.app')

@section('title', __('app.tools'))

@push('styles')
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mobileFirst.css') }}" rel="stylesheet">

    <style>
        .section-0{
            padding: 50px 120px;
            background-color: rgb(228, 228, 228);
            margin-top: -100px;
            padding-top: 150px;
        }

        h1{
            font-size: 23px;
        }

        h1[id] {
            margin-top: 0px;
        }

        /*subheader*/
        .sub-header{
            margin-bottom: 40px;
        }

        .sub-header-1{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .sub-header-1 > h1, .sub-header-2 > h3{
            color: rgb(142, 142, 142);
        }

        .sub-header-1 > h1.active, .sub-header-2 > h3.active{
            color: rgb(225, 175, 90);
        }

        .sub-header-2{
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        @media (max-width: 1249px) {
            .section-0 {
                padding: 50px 100px;
                margin-top: -80px;
                padding-top: 130px;
            }
        }

        @media (max-width: 960px) {
            .section-0 {
                padding: 40px 30px;
                margin-top: -80px;
                padding-top: 120px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="section-0">
        {{--Esto es lo que va arriba--}}
        <div class="sub-header">
            <div class="sub-header-1">
                <h1 style="cursor:pointer;">HOME VALUATION</h1> <h1 style="margin: 0 20px;">/</h1> <h1 id="mortage-calculator" style="cursor: pointer">MORTAGE CALCULATOR</h1></h1> <h1 style="margin: 0 20px;">/</h1> <h1 class="active" style="cursor: pointer">ADVANCE SEARCH</h1>
            </div>
            <div class="sub-header-2">
                <h3 class="active" style="cursor:pointer;">ADVANCE SEARCH</h3> <h3 style="margin: 0 10px;">/</h3> <h3 style="cursor: pointer">LISTING ID</h3><h3 style="margin: 0 10px;">/</h3> <h3 style="cursor: pointer">ADDRESS</h3><h3 style="margin: 0 10px;">/</h3> <h3 style="cursor: pointer">MAP SEARCH</h3>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
        });
    </script>
@endpush
