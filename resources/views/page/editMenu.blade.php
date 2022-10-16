@extends('layouts.apps')
@section('content')
<div class="card col-md-8 m-auto">
    <div class="card-head">
        Edit Menu
    </div>
    <div class="card-body">
        <form action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Menu">Menu</label>
                <input type="text" class="form-control" name="nama" value="{{$menu->nama}}" required>
            </div>
            <div class="form-group">
                <label for="Menu">Background Menu</label>
                <input type="color" class="form-control" name="warna" value="{{$menu->warna}}" required>
            </div>
            <div class="form-group">
                <img src="{{asset('uploads/icon/'.$menu->icon)}}" alt="{{$menu->icon}}" style="width: 100px" class="img-thumbnail">
            </div>
            <div class="form-group">
                <label for="Menu">Icon</label>
                <input type="file" class="form-control" name="icon">
            </div>
            <div class="form-group">
                <button class="btn btn-warning w-100">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection