<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProducthistoryRequest;
use App\Http\Requests\StoreProducthistoryRequest;
use App\Http\Requests\UpdateProducthistoryRequest;
use App\Models\Computer;
use App\Models\Laptop;
use App\Models\Phone;
use App\Models\Producthistory;
use App\Models\Tablet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProducthistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('producthistory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producthistories = Producthistory::with(['item_names', 'item_name_1s', 'item_name_2s', 'item_name_3s'])->get();

        return view('admin.producthistories.index', compact('producthistories'));
    }

    public function create()
    {
        abort_if(Gate::denies('producthistory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_names = Computer::pluck('invoice', 'id');

        $item_name_1s = Phone::pluck('invoice', 'id');

        $item_name_2s = Tablet::pluck('invoice', 'id');

        $item_name_3s = Laptop::pluck('invoice', 'id');

        return view('admin.producthistories.create', compact('item_name_1s', 'item_name_2s', 'item_name_3s', 'item_names'));
    }

    public function store(StoreProducthistoryRequest $request)
    {
        $producthistory = Producthistory::create($request->all());
        $producthistory->item_names()->sync($request->input('item_names', []));
        $producthistory->item_name_1s()->sync($request->input('item_name_1s', []));
        $producthistory->item_name_2s()->sync($request->input('item_name_2s', []));
        $producthistory->item_name_3s()->sync($request->input('item_name_3s', []));

        return redirect()->route('admin.producthistories.index');
    }

    public function edit(Producthistory $producthistory)
    {
        abort_if(Gate::denies('producthistory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $item_names = Computer::pluck('invoice', 'id');

        $item_name_1s = Phone::pluck('invoice', 'id');

        $item_name_2s = Tablet::pluck('invoice', 'id');

        $item_name_3s = Laptop::pluck('invoice', 'id');

        $producthistory->load('item_names', 'item_name_1s', 'item_name_2s', 'item_name_3s');

        return view('admin.producthistories.edit', compact('item_name_1s', 'item_name_2s', 'item_name_3s', 'item_names', 'producthistory'));
    }

    public function update(UpdateProducthistoryRequest $request, Producthistory $producthistory)
    {
        $producthistory->update($request->all());
        $producthistory->item_names()->sync($request->input('item_names', []));
        $producthistory->item_name_1s()->sync($request->input('item_name_1s', []));
        $producthistory->item_name_2s()->sync($request->input('item_name_2s', []));
        $producthistory->item_name_3s()->sync($request->input('item_name_3s', []));

        return redirect()->route('admin.producthistories.index');
    }

    public function show(Producthistory $producthistory)
    {
        abort_if(Gate::denies('producthistory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producthistory->load('item_names', 'item_name_1s', 'item_name_2s', 'item_name_3s');

        return view('admin.producthistories.show', compact('producthistory'));
    }

    public function destroy(Producthistory $producthistory)
    {
        abort_if(Gate::denies('producthistory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $producthistory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProducthistoryRequest $request)
    {
        Producthistory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
