<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyComputerRequest;
use App\Http\Requests\StoreComputerRequest;
use App\Http\Requests\UpdateComputerRequest;
use App\Models\Computer;
use App\Models\ItemManufacturer;
use App\Models\Producthistory;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComputersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('computer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $computers = Computer::with(['user', 'manufacturer', 'services'])->get();

        return view('admin.computers.index', compact('computers'));
    }

    public function create()
    {
        abort_if(Gate::denies('computer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.computers.create', compact('manufacturers', 'services', 'users'));
    }

    public function store(StoreComputerRequest $request)
    {
        $computer = Computer::create($request->all());

        return redirect()->route('admin.computers.index');
    }

    public function edit(Computer $computer)
    {
        abort_if(Gate::denies('computer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $manufacturers = ItemManufacturer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $services = Producthistory::pluck('services', 'id')->prepend(trans('global.pleaseSelect'), '');

        $computer->load('user', 'manufacturer', 'services');

        return view('admin.computers.edit', compact('computer', 'manufacturers', 'services', 'users'));
    }

    public function update(UpdateComputerRequest $request, Computer $computer)
    {
        $computer->update($request->all());

        return redirect()->route('admin.computers.index');
    }

    public function show(Computer $computer)
    {
        abort_if(Gate::denies('computer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $computer->load('user', 'manufacturer', 'services');

        return view('admin.computers.show', compact('computer'));
    }

    public function destroy(Computer $computer)
    {
        abort_if(Gate::denies('computer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $computer->delete();

        return back();
    }

    public function massDestroy(MassDestroyComputerRequest $request)
    {
        Computer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
