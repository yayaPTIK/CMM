@extends('layouts.apps')
@section('content')
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Menus</h6>
    </div>
    <div class="card-body">
      @if(session('successMsg'))
        <div class="alert alert-success">
          {{ session('successMsg') }}
        </div>
      @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <a href="" class="btn btn-success btn-sm m-1" data-toggle="modal"
                    data-target="#createMenu">
                    <i class="fas fa-plus"></i>
                </a>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Icon</th>
                        <th colspan="">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Icon</th>
                        <th colspan="">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($menus as $key=>$item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item->nama}}</td>
                            <td><span style="color:{{$item->warna}};background-color: {{$item->warna}}">{{"____"}}</span> / {{$item->warna}}</td>
                            <td>
                              <img src="{{asset('uploads/icon/'.$item->icon)}}" class="img-thumbnail" style="width: 50px;" alt="{{$item->icon}}">
                            </td>
                            <td>
                              <a href="{{route('submenu.crit',$item->id)}}" class="btn btn-primary btn-sm m-1">
                                <i class="fas fa-paper-plane"></i>
                              </a>
                                <a href="{{route('menu.edit',$item->id)}}" class="btn btn-warning btn-sm m-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                {{-- <a onclick="return confirm('Yakin ingin menghapus data?'); event.preventDefault(); document.getElementById('delete').submit();" class="btn btn-danger btn-sm m-1">
                                    
                                </a> --}}
                                <form action="{{route('menu.destroy',$item->id)}}" style="display: inline" id="delete" method="POST">
                                  @csrf
                                  @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger m-1" onclick="return confirm('Yakin ingin menghapus data?')">
                                      <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
 <div
      class="modal fade"
      id="createMenu"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Craete Menu</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Menu">Menu</label>
                    <input type="text" class="form-control" name="nama" required autofocus>
                </div>
                <div class="form-group">
                    <label for="Menu">Background Menu</label>
                    <input type="color" class="form-control" name="warna" required>
                </div>
                <div class="form-group">
                    <label for="Menu">Icon</label>
                    <input type="file" class="form-control" name="icon" required>
                </div>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              <i class="fas fa-trash"></i>
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fas fa-save"></i>
            </button>
            </form>
          </div>
        </div>

      </div>
@endsection