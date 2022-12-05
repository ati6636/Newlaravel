@extends('layouts.home')

@section('title','FAQ')

@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">FAQ</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div id="accordion">
                    @foreach($datalist as $data)
                            <h3>{{ $data->questions }}</h3>
                            <div>
                                <p>{!! $data->answer !!}</p>
                            </div>
                    @endforeach
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->
        @endsection

        @section('css')
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        @endsection

        @section('js')
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
            <script>
                $( function() {
                    $( "#accordion" ).accordion({
                        collapsible: true
                    });
                } );
            </script>
@endsection

