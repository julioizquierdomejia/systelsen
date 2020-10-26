import AppForm from '../app-components/Form/AppForm';

Vue.component('m-model-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name: '',
                description: '',
                enabled: true,
            }
        }
    }

});