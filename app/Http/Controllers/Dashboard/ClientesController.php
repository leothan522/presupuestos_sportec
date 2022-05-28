<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\ClienteExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientesController extends Controller
{
    public function index()
    {
        return view('dashboard.clientes.clientes');
    }

    public function export()
    {
        return Excel::download(new ClienteExport(), 'clientes.xlsx');
    }
}
