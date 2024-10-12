<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Suporte;
use App\Services\SupportService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\String_;

class SuporteController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {}


    public function index(Request $request)
    {
        $suportes = $this->service->getAll($request->filter);
        dd($suportes);
        return view('admin.suportes.index', compact('suportes'));
    }

    public function show(string $id)
    {
        // Suporte::find($id);
        // Suporte::where('id', $id)->first();
        // Suporte::where('id', '=', $id)->first();
        if (!$suporte = $this->service->findOne($id)) {
            return back();
        }
        return view('admin/suportes/show', compact('suporte'));
    }

    public function create()
    {
        return view('admin.suportes.create');    
    }


    public function store(StoreUpdateSupportRequest $request, Suporte $suporte)
    {
        $this->service->new(
            StoreUpdateSupportRequest::makeFromRequest($request)
        );
        
        return redirect()->route('suportes.index');
    }

    public function edit(string $id)
    {
        // if (!$suporte = $suporte->where('id', $id)->first()) 
        if (!$suporte = $this->service->findOne($id)) 
        {
            return back();
        }

        return view('admin/suportes/edit', compact('suporte'));
    }

    public function update(StoreUpdateSupportRequest $request, Suporte $suporte, string $id)
    {
        $suporte = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );
        if (!$suporte) {
            return back();
        }

        return redirect()->route('suportes.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('suportes.index');
    }

}
