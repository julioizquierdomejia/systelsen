<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ot\BulkDestroyOt;
use App\Http\Requests\Admin\Ot\DestroyOt;
use App\Http\Requests\Admin\Ot\IndexOt;
use App\Http\Requests\Admin\Ot\StoreOt;
use App\Http\Requests\Admin\Ot\UpdateOt;
use App\Models\Ot;
use App\Models\Client;
use App\Models\Motor;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OtController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexOt $request
     * @return array|Factory|View
     */
    public function index(IndexOt $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Ot::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'client_id', 'date', 'seller', 'motor_id', 'status'],

            // set columns to searchIn
            ['id', 'seller']
        );
        $clients = Client::all();
        $motors = Motor::all();

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        //return view('admin.ot.index', ['data' => $data]);
        return view('admin.ot.index', [
            'data' => $data,
            'clients' => $clients,
            'motors' => $motors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.ot.create');

        return view('admin.ot.create', [
            'clients' => Client::all(),
            'motors' => Motor::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreOt $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreOt $request)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Store the Ot
        $ot = Ot::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ots'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ots');
    }

    /**
     * Display the specified resource.
     *
     * @param Ot $ot
     * @throws AuthorizationException
     * @return void
     */
    public function show(Ot $ot)
    {
        $this->authorize('admin.ot.show', $ot);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ot $ots
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Ot $ot)
    {
        $this->authorize('admin.ot.edit', $ot);

        $ot->load('client_id');
        $ot->load('motor_id');

        return view('admin.ot.edit', [
            'ot' => $ot,
            'clients' => Client::all(),
            'motors' => Motor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateOt $request
     * @param Ot $ot
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateOt $request, Ot $ot)
    {
        // Sanitize input
        $sanitized = $request->getModifiedData();

        // Update changed values Ot
        $ot->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ots'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyOt $request
     * @param Ot $ot
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyOt $request, Ot $ot)
    {
        $ot->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyOt $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyOt $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Ot::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
