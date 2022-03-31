<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTabletRequest;
use App\Http\Requests\StoreTabletRequest;
use App\Http\Requests\UpdateTabletRequest;
use App\Models\ItemManufacturer;
use App\Models\Producthistory;
use App\Models\Tablet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TabletsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tablet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tablets = Tablet::with(['user', 'manufacturer', 'services'])->get();

        return view('admin.tablets.index', compact('tablets'));
    }

    public function create()
    {
        abort_if(Gate::denies('tablet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = ItemManufacturer::pluck('contactinfo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tablets.create', compact('manufacturers', 'services', 'users'));
    }

    public function store(StoreTabletRequest $request)
    {
        $tablet = Tablet::create($request->all());

        return redirect()->route('admin.tablets.index');
    }

    public function edit(Tablet $tablet)
    {
        abort_if(Gate::denies('tablet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = ItemManufacturer::pluck('contactinfo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tablet->load('user', 'manufacturer', 'services');

        return view('admin.tablets.edit', compact('manufacturers', 'services', 'tablet', 'users'));
    }

    public function update(UpdateTabletRequest $request, Tablet $tablet)
    {
        $tablet->update($request->all());

        return redirect()->route('admin.tablets.index');
    }

    public function show(Tablet $tablet)
    {
        abort_if(Gate::denies('tablet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tablet->load('user', 'manufacturer', 'services');

        return view('admin.tablets.show', compact('tablet'));
    }

    public function destroy(Tablet $tablet)
    {
        abort_if(Gate::denies('tablet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tablet->delete();

        return back();
    }

    public function massDestroy(MassDestroyTabletRequest $request)
    {
        Tablet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
