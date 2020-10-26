<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ruc'), 'has-success': fields.ruc && fields.ruc.valid }">
    <label for="ruc" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.ruc') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ruc" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ruc'), 'form-control-success': fields.ruc && fields.ruc.valid}" id="ruc" name="ruc" placeholder="{{ trans('admin.client.columns.ruc') }}">
        <div v-if="errors.has('ruc')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ruc') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.client.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.address') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address'), 'form-control-success': fields.address && fields.address.valid}" id="address" name="address" placeholder="{{ trans('admin.client.columns.address') }}">
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('company_phone'), 'has-success': fields.company_phone && fields.company_phone.valid }">
    <label for="company_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.company_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.company_phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('company_phone'), 'form-control-success': fields.company_phone && fields.company_phone.valid}" id="company_phone" name="company_phone" placeholder="{{ trans('admin.client.columns.company_phone') }}">
        <div v-if="errors.has('company_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('company_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contact'), 'has-success': fields.contact && fields.contact.valid }">
    <label for="contact" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.contact') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contact" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contact'), 'form-control-success': fields.contact && fields.contact.valid}" id="contact" name="contact" placeholder="{{ trans('admin.client.columns.contact') }}">
        <div v-if="errors.has('contact')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contact') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contact_phone'), 'has-success': fields.contact_phone && fields.contact_phone.valid }">
    <label for="contact_phone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.contact_phone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contact_phone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contact_phone'), 'form-control-success': fields.contact_phone && fields.contact_phone.valid}" id="contact_phone" name="contact_phone" placeholder="{{ trans('admin.client.columns.contact_phone') }}">
        <div v-if="errors.has('contact_phone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contact_phone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('contact_email'), 'has-success': fields.contact_email && fields.contact_email.valid }">
    <label for="contact_email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.client.columns.contact_email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.contact_email" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contact_email'), 'form-control-success': fields.contact_email && fields.contact_email.valid}" id="contact_email" name="contact_email" placeholder="{{ trans('admin.client.columns.contact_email') }}">
        <div v-if="errors.has('contact_email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contact_email') }}</div>
    </div>
</div>


