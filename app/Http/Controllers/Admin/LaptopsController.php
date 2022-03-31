<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLaptopRequest;
use App\Http\Requests\StoreLaptopRequest;
use App\Http\Requests\UpdateLaptopRequest;
use App\Models\ItemManufacturer;
use App\Models\Laptop;
use App\Models\Producthistory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LaptopsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('laptop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laptops = Laptop::with(['user', 'manufacturer', 'services'])->get();

        return view('admin.laptops.index', compact('laptops'));
    }

    public function create()
    {
        abort_if(Gate::denies('laptop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('contactinfo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.laptops.create', compact('manufacturers', 'services', 'users'));
    }

    public function store(StoreLaptopRequest $request)
    {
        $laptop = Laptop::create($request->all());

        return redirect()->route('admin.laptops.index');
    }

    public function edit(Laptop $laptop)
    {
        abort_if(Gate::denies('laptop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('contactinfo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        $laptop->load('user', 'manufacturer', 'services');

        return view('admin.laptops.edit', compact('laptop', 'manufacturers', 'services', 'users'));
    }

    public function update(UpdateLaptopRequest $request, Laptop $laptop)
    {
        $laptop->update($request->all());

        return redirect()->route('admin.laptops.index');
    }

    public function show(Laptop $laptop)
    {
        abort_if(Gate::denies('laptop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laptop->load('user', 'manufacturer', 'services', 'itemName3Producthistories');

        return view('admin.laptops.show', compact('laptop'));
    }

    public function destroy(Laptop $laptop)
    {
        abort_if(Gate::denies('laptop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $laptop->delete();

        return back();
    }

    public function massDestroy(MassDestroyLaptopRequest $request)
    {
        Laptop::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
