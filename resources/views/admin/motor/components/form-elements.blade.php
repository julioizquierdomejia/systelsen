<div class="form-group row align-items-center" :class="{'has-danger': errors.has('description'), 'has-success': fields.description && fields.description.valid }">
    <label for="description" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.description') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <wysiwyg v-model="form.description" v-validate="'required'" id="description" name="description" :config="mediaWysiwygConfig"></wysiwyg>
        </div>
        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('code'), 'has-success': fields.code && fields.code.valid }">
    <label for="code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.code" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('code'), 'form-control-success': fields.code && fields.code.valid}" id="code" name="code" placeholder="{{ trans('admin.motor.columns.code') }}">
        <div v-if="errors.has('code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('brand_id'), 'has-success': fields.brand_id && fields.brand_id.valid }">
    <label for="brand_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.brand_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.brand_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('brand_id'), 'form-control-success': fields.brand_id && fields.brand_id.valid}" id="brand_id" name="brand_id" placeholder="{{ trans('admin.motor.columns.brand_id') }}">
        <div v-if="errors.has('brand_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('brand_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('model_id'), 'has-success': fields.model_id && fields.model_id.valid }">
    <label for="model_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.model_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.model_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('model_id'), 'form-control-success': fields.model_id && fields.model_id.valid}" id="model_id" name="model_id" placeholder="{{ trans('admin.motor.columns.model_id') }}">
        <div v-if="errors.has('model_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('model_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('power_number'), 'has-success': fields.power_number && fields.power_number.valid }">
    <label for="power_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.power_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.power_number" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('power_number'), 'form-control-success': fields.power_number && fields.power_number.valid}" id="power_number" name="power_number" placeholder="{{ trans('admin.motor.columns.power_number') }}">
        <div v-if="errors.has('power_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('power_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('power_measurement'), 'has-success': fields.power_measurement && fields.power_measurement.valid }">
    <label for="power_measurement" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.power_measurement') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.power_measurement" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('power_measurement'), 'form-control-success': fields.power_measurement && fields.power_measurement.valid}" id="power_measurement" name="power_measurement" placeholder="{{ trans('admin.motor.columns.power_measurement') }}">
        <div v-if="errors.has('power_measurement')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('power_measurement') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('volt'), 'has-success': fields.volt && fields.volt.valid }">
    <label for="volt" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.volt') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.volt" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('volt'), 'form-control-success': fields.volt && fields.volt.valid}" id="volt" name="volt" placeholder="{{ trans('admin.motor.columns.volt') }}">
        <div v-if="errors.has('volt')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('volt') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('speed'), 'has-success': fields.speed && fields.speed.valid }">
    <label for="speed" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.motor.columns.speed') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.speed" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('speed'), 'form-control-success': fields.speed && fields.speed.valid}" id="speed" name="speed" placeholder="{{ trans('admin.motor.columns.speed') }}">
        <div v-if="errors.has('speed')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('speed') }}</div>
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


