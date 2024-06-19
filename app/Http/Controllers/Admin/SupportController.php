<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(protected SupportService $service) {}

    public function index(Request $request)
    {
        //$supports =  $this->service->getAll($request->filter);
        $supports =  $this->service->paginate(page: $request->get('page', 1), totalPerPage: $request->get('per_page', 2), filter: $request->filter );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin.supports.index', compact('supports', 'filters'));
    }

    public function show(string $id)
    {
        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function edit(String $id)
    {
        //if(!$support = $support->where('id', $id)->first()) {
        if(!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support ,String|int $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(String $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }

}
