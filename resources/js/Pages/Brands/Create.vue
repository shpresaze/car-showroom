<template>
    <form @submit.prevent="submit">
        <input type="text" id="name" v-model="form.name">

        <button type="submit">
            Save
        </button>
        <p>{{message}}</p>
    </form>
</template>

<script>
export default {
    name: 'Create',
    data(){
        return{
            form: this.$inertia.form({
                name: ""
            }),
            message: '',
        }
    },
    methods: {
        submit(){
            this.$inertia.post(route('brands.store'),this.form,{
                onSuccess: () => {
                    this.form.reset();
                    this.message = 'success'
                },
            })
        }
    }
}
</script>
