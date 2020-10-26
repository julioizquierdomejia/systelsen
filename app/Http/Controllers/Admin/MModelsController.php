<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MModel\BulkDestroyMModel;
use App\Http\Requests\Admin\MModel\DestroyMModel;
use App\Http\Requests\Admin\MModel\IndexMModel;
use App\Http\Requests\Admin\MModel\StoreMModel;
use App\Http\Requests\Admin\MModel\UpdateMModel;
use App\Models\MModel;
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

class MModelsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMModel $request
     * @return array|Factory|View
     */
    public function index(IndexMModel $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MModel::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'description', 'status'],

            // set columns to searchIn
            ['id', 'name', 'description', 'status']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.m-model.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.m-model.create');

        return view('admin.m-model.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMModel $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMModel $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MModel
        $mModel = MModel::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/m-models'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/m-models');
    }

    /**
     * Display the specified resource.
     *
     * @param MModel $mModel
     * @throws AuthorizationException
     * @return void
     */
    public function show(MModel $mModel)
    {
        $this->authorize('admin.m-model.show', $mModel);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MModel $mModel
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MModel $mModel)
    {
        $this->authorize('admin.m-model.edit', $mModel);


        return view('admin.m-model.edit', [
            'mModel' => $mModel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMModel $request
     * @param MModel $mModel
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMModel $request, MModel $mModel)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MModel
        $mModel->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/m-models'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/m-models');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMModel $request
     * @param MModel $mModel
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMModel $request, MModel $mModel)
    {
        $mModel->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMModel $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMModel $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MModel::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
