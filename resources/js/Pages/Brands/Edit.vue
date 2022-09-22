<template>
    <form @click.prevent="submit">
        <input type="text" id="name" v-model="form.name">
        <button type="submit">
            Save
        </button>
    </form>
</template>

<script>
export default {
    name: 'Edit',
    props: {
        brand: Object
    },
    data() {
        return{
            form: this.$inertia.form({
                name: this.brand.name
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(route('brands.update',this.brand), this.form);
        }
    }
}
</script>
