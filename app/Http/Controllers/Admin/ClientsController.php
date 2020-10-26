<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Client\BulkDestroyClient;
use App\Http\Requests\Admin\Client\DestroyClient;
use App\Http\Requests\Admin\Client\IndexClient;
use App\Http\Requests\Admin\Client\StoreClient;
use App\Http\Requests\Admin\Client\UpdateClient;
use App\Models\Client;
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

class ClientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexClient $request
     * @return array|Factory|View
     */
    public function index(IndexClient $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Client::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'ruc', 'name', 'address', 'company_phone', 'contact', 'contact_phone', 'contact_email'],

            // set columns to searchIn
            ['id', 'ruc', 'name', 'address', 'company_phone', 'contact', 'contact_phone', 'contact_email']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.client.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.client.create');

        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClient $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreClient $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Client
        $client = Client::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/clients'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @throws AuthorizationException
     * @return void
     */
    public function show(Client $client)
    {
        $this->authorize('admin.client.show', $client);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Client $client)
    {
        $this->authorize('admin.client.edit', $client);


        return view('admin.client.edit', [
            'client' => $client,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClient $request
     * @param Client $client
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateClient $request, Client $client)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Client
        $client->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clients'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyClient $request
     * @param Client $client
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyClient $request, Client $client)
    {
        $client->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyClient $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyClient $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Client::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
