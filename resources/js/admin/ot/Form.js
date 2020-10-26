import AppForm from '../app-components/Form/AppForm';

Vue.component('ot-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                client_id:  '' ,
                date:  '' ,
                seller:  '' ,
                motor_id:  '' ,
                status:  '' ,
                
            }
        }
    }

});