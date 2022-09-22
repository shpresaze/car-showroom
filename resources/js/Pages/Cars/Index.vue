<template>
    <div class="w-50 mx-auto text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">
                    id
                </th>
                <th scope="col">
                    number
                </th>
                <th scope="col">
                    title
                </th>
                <th scope="col">
                    description
                </th>
                <th scope="col">
                    image
                </th>
                <th scope="col">
                    model_id
                </th>
                <th scope="col">

                </th>
                <th scope="col">

                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="car in cars.data" :key="car.id">
                <th scope="row">
                    {{car.id}}
                </th>
                <td>
                    {{car.number}}
                </td>
                <td>
                    {{car.title}}
                </td>
                <td>
                    {{car.description}}
                </td>
                <td>
                    {{car.image}}
                </td>
                <td>
                    {{car.model_id}}
                </td>
                <td>
                    <Link :href="route('cars.destroy',car)" method="DELETE">
                        Delete
                    </Link>
                </td>
                <td>
                    <Link :href="route('cars.edit',car)">
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
        cars: Array
    }
}
</script>
