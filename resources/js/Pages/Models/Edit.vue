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
        model: Object
    },
    data() {
        return{
            form: this.$inertia.form({
                name: this.model.name
            })
        }
    },
    methods: {
        submit(){
            this.$inertia.put(route('models.update',this.model), this.form);
        }
    }
}
</script>
