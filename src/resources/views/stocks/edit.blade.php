@extends('main')
@section('section')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form id="editForm" action="{{ route('stocks.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan Nama Produk">
                                @error('nama_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach(App\Models\Stock::kategori as $key => $value)
                                        <option value="{{ $key }}" {{ old('kategori') == $key ? 'selected' : '' }}>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Size</label>
                                <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ old('size') }}" placeholder="Masukkan Size">
                                @error('size')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jumlah Stock</label>
                                <input type="text" class="form-control @error('jumlah_stock') is-invalid @enderror" name="jumlah_stock" value="{{ old('jumlah_stock') }}" placeholder="Masukkan Jumlah Stock">
                                @error('jumlah_stock')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

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
        CKEDITOR.replace('description');
        
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    </script>
@endsection