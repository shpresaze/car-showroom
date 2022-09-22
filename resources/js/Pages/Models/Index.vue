<template>
    <div class="w-50 mx-auto text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">
                    id
                </th>
                <th scope="col">
                    name
                </th>
                <th scope="col">
                    brand id
                </th>
                <th scope="col">

                </th>
                <th scope="col">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="model in models.data" :key="model.id">
                <th scope="row">
                    {{model.id}}
                </th>
                <td>
                    {{model.name}}
                </td>
                <td>
                    {{model.brand_id}}
                </td>
                <td>
                    <Link :href="route('models.destroy',model)" method="DELETE">
                        Delete
                    </Link>
                </td>
                <td>
                    <Link :href="route('models.edit',model)">
                        Edit
                    </Link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'Index',
    props: {
        models: Array
    }
}
</script>
