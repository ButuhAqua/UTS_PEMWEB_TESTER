@extends('main')
@section('section')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">{{ trans('Toko Baju Lia') }}</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h4>Detail Produk</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Nama Produk</th>
                                <td>{{ $stock->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td>{{ \App\Models\Stock::kategori[$stock->kategori] ?? $stock->kategori }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Size</th>
                                <td>{{ $stock->size }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Jumlah Stock</th>
                                <td>{{ $stock->jumlah_stock }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('stocks.index') }}" class="btn btn-md btn-custom btn-secondary">Kembali</a>
                    <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-md btn-custom btn-primary">EDIT</a>
                    <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda Yakin ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-md btn-custom btn-danger">HAPUS</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif
</script>
@endsection