<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spending;

class SpendingsController extends Controller
{
    public function index()
    {
        $spendings = Spending::all();
        return view('spendings/index', compact('spendings'));
    }

    public function create()
    {
        return view('spendings/create');
    }

    public function store(Request $request)
    {
        $data = new Spending();
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->save();
        alert()->success('Create Success', 'Create Spending');
        return redirect('spendings');
    }

    public function show(Spending $spending)
    {
        return view('spendings/show', compact('spending'));
    }

    public function edit(Spending $spending)
    {
        return view ('spendings/edit', compact('spending'));
    }

    public function update(Request $request, $id)
    {
        $data = Spending::findOrFail($id);
        $data->name = $request->get('name');
        $data->price = $request->get('price');
        $data->save();
        alert()->success('Update Success', 'Update Spending');
        return redirect('spendings');
    }

    public function destroy(Spending $spending)
    {
        Spending::destroy($spending->id);
        alert()->success('Delete Success', 'Delete Spending');
        return redirect('/spendings')->with('status', 'Data Berhasil Dihapus');
    }
}
