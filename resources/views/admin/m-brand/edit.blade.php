@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.m-brand.actions.edit', ['name' => $mBrand->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <m-brand-form
                :action="'{{ $mBrand->resource_url }}'"
                :data="{{ $mBrand->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.m-brand.actions.edit', ['name' => $mBrand->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.m-brand.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </m-brand-form>

        </div>
    
</div>

@endsection