@extends('layout.app')

@section('title')
    Pembelian
@endsection

@section('content')
<div class="card mt-3">
  <div class="card-header">
    <div class="card-title">
      <h5>Edit Pembelian</h5>

      <div class="card-body">
        <form action="{{route('pembelian.update', $pembelian->id)}}" 
          method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama</label>
            <select name="barang_id" id="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
              <option value="{{$pembelian->barang_id}}">{{$pembelian->barang->nama}}</option>
              @foreach ($barang as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
              @endforeach
            </select>
            @error('barang_id')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" value="{{$pembelian->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror">
            @error('jumlah')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" value="{{$pembelian->harga}}" class="form-control @error('harga') is-invalid @enderror">
            @error('harga')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


    