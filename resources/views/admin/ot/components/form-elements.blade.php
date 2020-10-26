<div class="form-group row align-items-center" :class="{'has-danger': errors.has('client_id'), 'has-success': fields.client_id && fields.client_id.valid }">
    <label for="client_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ot.columns.client_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.client_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('client_id'), 'form-control-success': fields.client_id && fields.client_id.valid}" id="client_id" name="client_id" placeholder="{{ trans('admin.ot.columns.client_id') }}"> -->
        <multiselect v-model="form.client_id" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" track-by="id" label="name" :options="{{ $clients->toJson() }}" :searchable="true" :allow-empty="false" open-direction="bottom"></multiselect>
        <div v-if="errors.has('client_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('client_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date'), 'has-success': fields.date && fields.date.valid }">
    <label for="date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ot.columns.date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('date'), 'form-control-success': fields.date && fields.date.valid}" id="date" name="date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('seller'), 'has-success': fields.seller && fields.seller.valid }">
    <label for="seller" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ot.columns.seller') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.seller" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('seller'), 'form-control-success': fields.seller && fields.seller.valid}" id="seller" name="seller" placeholder="{{ trans('admin.ot.columns.seller') }}">
        <div v-if="errors.has('seller')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('seller') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('motor_id'), 'has-success': fields.motor_id && fields.motor_id.valid }">
    <label for="motor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.ot.columns.motor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <!-- <input type="text" v-model="form.motor_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('motor_id'), 'form-control-success': fields.motor_id && fields.motor_id.valid}" id="motor_id" name="motor_id" placeholder="{{ trans('admin.ot.columns.motor_id') }}"> -->
        <multiselect v-model="form.motor_id" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" track-by="id" label="code" :options="{{ $motors->toJson() }}" :searchable="true" :allow-empty="false" open-direction="bottom"></multiselect>
        <div v-if="errors.has('motor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('motor_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="status" type="checkbox" v-model="form.status" v-validate="''" data-vv-name="status"  name="status_fake_element">
        <label class="form-check-label" for="status">
            {{ trans('admin.motor.columns.status') }}
        </label>
        <input type="hidden" name="status" :value="form.status">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>
