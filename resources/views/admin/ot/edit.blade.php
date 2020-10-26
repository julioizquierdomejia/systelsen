@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.ot.actions.edit', ['name' => $ot->id]))

@section('body')

    <div class="container-xl">

        <ot-form
            :action="'{{ $ot->resource_url }}'"
            :data="{{ $ot->toJson() }}"
            v-cloak
            inline-template>
        
            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.ot.actions.edit', ['name' => $ot->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.ot.components.form-elements')
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.motor.subtitle') }}
                    </div>

                    <div class="card-body">
                        @include('admin.ot.components.motor-elements')
                    </div>   
                </div>
                    
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

    </ot-form>
    
</div>

@endsection