<template>
    <form @submit.prevent="submit" class="row w-25 text-end">
        <label for="number" class="col-3">number</label>
        <input type="text" id="number" v-model="form.number" class="col-9">
        <label for="title" class="col-3">title</label>
        <input type="text" id="title" v-model="form.title" class="col-9">
        <label for="description" class="col-3">description</label>
        <input type="text" id="description" v-model="form.description" class="col-9">
        <label for="image" class="col-3">image</label>
        <input type="text" id="image" v-model="form.image" class="col-9">
        <label for="model_id" class="col-3">Model</label>
        <select
            class="col-9"
            name="model_id"
            id="model_id"
            type="text"
            v-model="form.model_id">
            <option v-for="model in models" :key="model.id" :value="model.id">
                {{model.name}} - {{model.brand_id}}
            </option>
        </select>
        <div class="d-flex align-items-end flex-column w-100">
            <button type="submit" class="btn bg-primary text-white w-25 my-2">
                Save
            </button>
        </div>
        <p>{{message}}</p>
    </form>
</template>

<script>
export default {
    name: 'Create',
    props : {
        models: Array,
    },
    data(){
        return{
            form: this.$inertia.form({
                number: "",
                title: "",
                description: "",
                image: "",
                model_id: ""
            }),
            message: '',
        }
    },
    methods: {
        submit(){
            this.$inertia.post(route('cars.store'),this.form,{
                onSuccess: () => {
                    this.form.reset();
                    this.message = 'success'
                },
            })
        }
    }
}
</script>
