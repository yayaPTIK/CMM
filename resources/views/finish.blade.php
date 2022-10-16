<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/style.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>
    <div class="container-fluid d-flex align-items-center wrapp" id="wrapp">
        <div class="homepage">
            <video src="{{asset('asset/city.mp4')}}" autoplay muted loop></video>
        </div>
        <div class="home">
            <div class="logo mb-5">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 m-auto">
                        <a href="">
                            <img src="{{asset('asset/kuninga.png')}}" alt="Kabupaten Kuningan">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="content container text-justify">
                <div class="row gy-4 text-center d-flex justify-content-center  row-cols-sm-2 row-cols-md-6">
                    @foreach ($menu as $item)
                        <div class="col mt-4">
                            <button type="button" class="btn btn-lg" style="background-color: {{$item->warna}}" data-toggle="modal" data-target="#staticBackdrop{{$item->id}}" data-placement="top" title="{{$item->nama}}">
                                <img src="{{asset('uploads/icon/'.$item->icon)}}" alt="{{$item->icon}}">
                            </button>
                            <div class="modal fade bd-example-modal-lg" id="staticBackdrop{{$item->id}}" data-backdrop="" data-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{$item->nama}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row row-cols-sm-6 row-cols-md-6">
                                                @if($item->submenus != null)
                                                    @foreach ($item->submenus as $sub)
                                                        <div class="col-md-4">
                                                            <a href="{{$sub->link}}" target="__blank">
                                                                {{$sub->nama}}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    {{""}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
{{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>
