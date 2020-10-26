import AppForm from '../app-components/Form/AppForm';

Vue.component('client-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                ruc:  '' ,
                name:  '' ,
                address:  '' ,
                company_phone:  '' ,
                contact:  '' ,
                contact_phone:  '' ,
                contact_email:  '' ,
                
            }
        }
    }

});