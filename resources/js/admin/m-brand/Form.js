import AppForm from '../app-components/Form/AppForm';

Vue.component('m-brand-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                description:  '' ,
                enabled:  true ,
                
            }
        }
    }

});