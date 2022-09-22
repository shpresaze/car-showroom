<template>
    <form @submit.prevent="submit">
        <input type="text" id="name" v-model="form.name">
        <select
            name="brand_id"
            id="brand_id"
            type="text"
            v-model="form.brand_id">
            <option v-for="brand in brands" :key="brand.id" :value="brand.id">
                {{brand.name}}
            </option>
        </select>
        <button type="submit">
            Save
        </button>
        <p>{{message}}</p>
    </form>
</template>

<script>
export default {
    name: 'Create',
    props : {
        brands: Array,
    },
    data(){
        return{
            form: this.$inertia.form({
                name: "",
                brand_id: ""
            }),
            message: '',
        }
    },
    methods: {
        submit(){
            this.$inertia.post(route('models.store'),this.form,{
                onSuccess: () => {
                    this.form.reset();
                    this.message = 'success'
                },
            })
        }
    }
}
</script>
