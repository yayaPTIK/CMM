@extends('layouts.apps')
@section('content')
<div class="card col-md-8 m-auto">
    <div class="card-head">
        Create Sub-Menu
    </div>
    <div class="card-body">
        <form action="{{route('submenu.store')}}" method="POST">
            @csrf
            <div class="form-group">
                {{-- <label for="Menu">Menu</label> --}}
                <input type="text" readonly class="form-control" name="id" value="{{$menu->id}}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Sub-Menu</label>
                <input type="text" class="form-control" name="nama" required autofocus>
            </div>
            <div class="form-group">
                <label for="link">Tautan Link</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection