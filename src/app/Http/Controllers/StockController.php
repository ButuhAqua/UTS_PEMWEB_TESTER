<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StockController extends Controller
{
    public function index(): View
    {
        $stocks = Stock::latest()->paginate(10);
        return view('stocks.index', compact('stocks'));
    }

    public function create(): View
    {
        return view('stocks.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_produk'       => 'required|string|min:1',
            'kategori'          => 'required|string|min:1',
            'size'              => 'required|string|min:1',
            'jumlah_stock'      => 'required|string|min:1',
        ]);

        Stock::create([
            'nama_produk'       => $request->nama_produk,
            'kategori'          => $request->kategori,
            'size'              => $request->size,
            'jumlah_stock'      => $request->jumlah_stock,
        ]);

        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        $stock = Stock::findOrFail($id);
        return view('stocks.show', compact('stock'));
    }

    public function edit(string $id): View
    {
        $stock = Stock::findOrFail($id);
        return view('stocks.edit', compact('stock'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'nama_produk'       => 'required|string|min:1',
            'kategori'          => 'required|string|min:1',
            'size'              => 'required|string|min:1',
            'jumlah_stock'      => 'required|string|min:1',
        ]);

        $stock = Stock::findOrFail($id);

        $stock->update([
            'nama_produk'       => $request->nama_produk,
            'kategori'          => $request->kategori,
            'size'              => $request->size,
            'jumlah_stock'      => $request->jumlah_stock,
        ]);

        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect()->route('stocks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
