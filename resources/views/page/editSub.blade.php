@extends('layouts.apps')
@section('content')
<div class="card col-md-8 m-auto">
    <div class="card-head">
        Edit Sub-Menu
    </div>
    <div class="card-body">
        <form action="{{route('submenu.update',$sub->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Menu">Menu</label>
                <!-- <input type="text" readonly class="form-control" name="id" value="{{$sub->menu_id}}" required> -->
                <select name="menu" id="menu" class="form-control @error('menu')is-invalid @enderror">
                    <option value="">--Pilih Menu--</option>
                    @foreach ($menu as $item)
                        <option value="{{$item->id}}" {{$item->id == $sub->menu_id ? "selected":""}}>{{$item->nama}}</option>
                    @endforeach
                </select>
                @error('menu')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama">Nama Sub-Menu</label>
                <input type="text" class="form-control" name="nama" value="{{$sub->nama}}" required autofocus>
            </div>
            <div class="form-group">
                <label for="link">Tautan Link</label>
                <input type="text" class="form-control" name="link" value="{{$sub->link}}" required>
            </div>
            <div class="form-group">
                <button class="btn btn-primary w-100">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection