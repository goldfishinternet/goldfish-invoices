<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientContact;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientContactController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_contact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.client-contact.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_contact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.client-contact.create');
    }

    public function edit(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.client-contact.edit', compact('clientContact'));
    }

    public function show(ClientContact $clientContact)
    {
        abort_if(Gate::denies('client_contact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.client-contact.show', compact('clientContact'));
    }
}
