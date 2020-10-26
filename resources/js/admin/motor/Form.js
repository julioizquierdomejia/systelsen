import AppForm from '../app-components/Form/AppForm';

Vue.component('motor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                description:  '' ,
                code:  '' ,
                brand_id:  '' ,
                model_id:  '' ,
                power_number:  '' ,
                power_measurement:  '' ,
                volt:  '' ,
                speed:  '' ,
                status:  true ,
                
            }
        }
    }

});