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

                    </th>
                    <th scope="col">

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="brand in brands.data" :key="brand.id">
                    <th scope="row">
                        {{brand.id}}
                    </th>
                    <td>
                        {{brand.name}}
                    </td>
                    <td>
                        <Link :href="route('brands.destroy',brand)" method="DELETE">
                            Delete
                        </Link>
                    </td>
                    <td>
                        <Link :href="route('brands.edit',brand)">
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
        brands: Array
    }
}
</script>
