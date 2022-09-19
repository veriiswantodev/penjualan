@extends('layout.app')

@section('title')
    Penjualan
@endsection

@section('content')
<div class="card mt-3">
  <div class="card-header">
    <div class="card-title">
      <h5>Edit Penjualan</h5>

      <div class="card-body">
        <form action="{{route('penjualan.update', $penjualan->id)}}" 
          method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nama">Nama Barang</label>
            <select name="barang_id" id="barang_id" class="form-control @error('barang_id') is-invalid @enderror">
              <option value="{{$penjualan->barang_id}}">{{$penjualan->barang->nama}}</option>
              @foreach ($barang as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
              @endforeach
            </select>
            @error('barang_id')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          <div class="form-group">
            <label for="nama">Nama Pembeli</label>
            <select name="pembeli_id" id="pembeli_id" class="form-control @error('pembeli_id') is-invalid @enderror">
              <option value="{{$penjualan->pembeli_id}}">{{$penjualan->pembeli->nama}}</option>
              @foreach ($pembeli as $item)
                  <option value="{{$item->id}}">{{$item->nama}}</option>
              @endforeach
            </select>
            @error('pembeli_id')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" value="{{$penjualan->jumlah}}" class="form-control @error('jumlah') is-invalid @enderror">
            @error('jumlah')
                <div class="text-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="harga_jual">Harga Jual</label>
            <input type="text" name="harga_jual" id="harga_jual" value="{{$penjualan->harga_jual}}" class="form-control @error('harga_jual') is-invalid @enderror">
            @error('harga_jual')
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


    