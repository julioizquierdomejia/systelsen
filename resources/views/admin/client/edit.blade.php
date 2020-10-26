@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.client.actions.edit', ['name' => $client->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <client-form
                :action="'{{ $client->resource_url }}'"
                :data="{{ $client->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.client.actions.edit', ['name' => $client->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.client.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </client-form>

        </div>
    
</div>

@endsection