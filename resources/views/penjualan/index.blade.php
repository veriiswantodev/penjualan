@extends('layout.app')

@section('title')
    Penjualan
@endsection

@section('content')
<div class="card mt-3">
  <div class="card-header">
    <div class="card-title">
      <h5>Data Penjualan</h5>

      <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#modalTambah"><i class="fa fa-plus"></i></button>
    </div>
  </div>

  <div class="card-body">
    <table class="table table-striped ">
      <thead>
        <tr>
          <th style="width: 5%">No.</th>
          <th>Nama Barang</th>
          <th>Pembeli</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th style="width: 10%">Aksi</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($penjualan as $item)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$item->barang->nama}}</td>
          <td>{{$item->pembeli->nama}}</td>
          <td>{{$item->jumlah}}</td>
          <td>{{$item->harga_jual}}</td>
          <td>
            <a href="/penjualan/{{$item->id}}/edit" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </a>
            <a href="/penjualan/{{$item->id}}/hapus" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash"></i> </a>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('penjualan.store')}}" method="POST">
          @csrf
          <div class="form-group mb-3">
            <label for="barang">Barang</label>
            <select name="barang_id" id="barang_id" class="form-control">
              @foreach ($barang as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="pembeli">Pembeli</label>
            <select name="pembeli_id" id="pembeli_id" class="form-control">
              @foreach ($pembeli as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" 
            class="form-control @error('jumlah') is-invalid @enderror">
          </div>

          <div class="form-group mb-3">
            <label for="harga">Harga</label>
            <input type="text" name="harga_jual" id="harga" 
            class="form-control @error('harga') is-invalid @enderror">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection