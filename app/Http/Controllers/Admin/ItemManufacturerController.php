<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItemManufacturerRequest;
use App\Http\Requests\StoreItemManufacturerRequest;
use App\Http\Requests\UpdateItemManufacturerRequest;
use App\Models\ItemManufacturer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItemManufacturerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_manufacturer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManufacturers = ItemManufacturer::all();

        return view('admin.itemManufacturers.index', compact('itemManufacturers'));
    }

    public function create()
    {
        abort_if(Gate::denies('item_manufacturer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemManufacturers.create');
    }

    public function store(StoreItemManufacturerRequest $request)
    {
        $itemManufacturer = ItemManufacturer::create($request->all());

        return redirect()->route('admin.item-manufacturers.index');
    }

    public function edit(ItemManufacturer $itemManufacturer)
    {
        abort_if(Gate::denies('item_manufacturer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemManufacturers.edit', compact('itemManufacturer'));
    }

    public function update(UpdateItemManufacturerRequest $request, ItemManufacturer $itemManufacturer)
    {
        $itemManufacturer->update($request->all());

        return redirect()->route('admin.item-manufacturers.index');
    }

    public function show(ItemManufacturer $itemManufacturer)
    {
        abort_if(Gate::denies('item_manufacturer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.itemManufacturers.show', compact('itemManufacturer'));
    }

    public function destroy(ItemManufacturer $itemManufacturer)
    {
        abort_if(Gate::denies('item_manufacturer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemManufacturer->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemManufacturerRequest $request)
    {
        ItemManufacturer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
