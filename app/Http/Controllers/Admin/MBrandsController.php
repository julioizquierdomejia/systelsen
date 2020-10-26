<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MBrand\BulkDestroyMBrand;
use App\Http\Requests\Admin\MBrand\DestroyMBrand;
use App\Http\Requests\Admin\MBrand\IndexMBrand;
use App\Http\Requests\Admin\MBrand\StoreMBrand;
use App\Http\Requests\Admin\MBrand\UpdateMBrand;
use App\Models\MBrand;
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

class MBrandsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMBrand $request
     * @return array|Factory|View
     */
    public function index(IndexMBrand $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(MBrand::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'enabled'],

            // set columns to searchIn
            ['id', 'name', 'description']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.m-brand.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.m-brand.create');

        return view('admin.m-brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMBrand $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMBrand $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the MBrand
        $mBrand = MBrand::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/m-brands'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/m-brands');
    }

    /**
     * Display the specified resource.
     *
     * @param MBrand $mBrand
     * @throws AuthorizationException
     * @return void
     */
    public function show(MBrand $mBrand)
    {
        $this->authorize('admin.m-brand.show', $mBrand);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MBrand $mBrand
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(MBrand $mBrand)
    {
        $this->authorize('admin.m-brand.edit', $mBrand);


        return view('admin.m-brand.edit', [
            'mBrand' => $mBrand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMBrand $request
     * @param MBrand $mBrand
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMBrand $request, MBrand $mBrand)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values MBrand
        $mBrand->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/m-brands'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/m-brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMBrand $request
     * @param MBrand $mBrand
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMBrand $request, MBrand $mBrand)
    {
        $mBrand->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMBrand $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMBrand $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    MBrand::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
