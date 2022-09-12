@extends('layout.app')

@section('title')
    Barang
@endsection

@section('content')

<div class="card mt-3">
  <div class="card-header">
    <div class="card-title">
      <h5>Edit Barang</h5>
    </div>
  </div>

  <div class="card-body">
    <form action="{{ route('barang.update', $b->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="nama" class="form-label">Nama Barang</label>
            <input type="text" name="nama" id="nama" value="{{ $b->nama }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="col-lg-6">
          <div class="form-group">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" name="harga" value="{{ $b->harga }}" class="form-control @error('harga') is-invalid @enderror">
            @error('harga')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stok" value="{{ $b->stok }}" class="form-control @error('stok') is-invalid @enderror">
            @error('stok')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label for="suplier" class="form-label">Suplier</label>
            <select name="suplier_id" id="suplier_id" class="form-control @error('suplier_id') is-invalid @enderror">
              <option value="{{$b->suplier_id}}" selected>{{$b->suplier->nama}}</option>
              @foreach ($suplier as $s)
                  <option value="{{$s->id}}">{{$s->nama}}</option>
              @endforeach
            </select>
            @error('suplier_id')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label for="kategori" class="form-label">kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
              <option value="{{$b->kategori_id}}" selected>{{$b->kategori->nama}}</option>
              @foreach ($kategori as $item)
                <option value="{{$item->id}}">{{$item->nama}}</option>
              @endforeach
            </select>
            @error('kategori_id')
              <div class="text-danger">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
      </div>

      <div class="modal-footer mt-3">
        <button type="submit" class="btn btn-warning">Update</button>
      </div>
    </form>
  </div>
</div>

@endsection