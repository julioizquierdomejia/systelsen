<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Motor\BulkDestroyMotor;
use App\Http\Requests\Admin\Motor\DestroyMotor;
use App\Http\Requests\Admin\Motor\IndexMotor;
use App\Http\Requests\Admin\Motor\StoreMotor;
use App\Http\Requests\Admin\Motor\UpdateMotor;
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

class MotorsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexMotor $request
     * @return array|Factory|View
     */
    public function index(IndexMotor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Motor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'code', 'brand_id', 'model_id', 'power_number', 'power_measurement', 'volt', 'speed', 'status'],

            // set columns to searchIn
            ['id', 'description', 'code', 'power_number', 'power_measurement', 'volt', 'speed']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.motor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.motor.create');

        return view('admin.motor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMotor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreMotor $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Motor
        $motor = Motor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/motors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/motors');
    }

    /**
     * Display the specified resource.
     *
     * @param Motor $motor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Motor $motor)
    {
        $this->authorize('admin.motor.show', $motor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Motor $motor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Motor $motor)
    {
        $this->authorize('admin.motor.edit', $motor);


        return view('admin.motor.edit', [
            'motor' => $motor,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMotor $request
     * @param Motor $motor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateMotor $request, Motor $motor)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Motor
        $motor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/motors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/motors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyMotor $request
     * @param Motor $motor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyMotor $request, Motor $motor)
    {
        $motor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyMotor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyMotor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Motor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
