<template>
    <div>
        <h2 class="text-center">Lista de cidades</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Detalhes</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="city in cities" :key="cities.id">
                <td>{{ city.id }}</td>
                <td>{{ city.name }}</td>
                <td>{{ city.group }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-city', params: { id: city.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCity(city.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cities: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/cities/')
                .then(response => {
                    this.cities = [...response.data.cities]
                    //this.cities = response.data.cities;
                });
        },
        methods: {
            deleteCity(id) {
                this.axios
                    .delete(`http://localhost:8000/api/cities/${id}`)
                    .then(response => {
                        let i = this.cities.map(data => data.id).indexOf(id);
                        this.cities.splice(i, 1)
                    });
            }
        }
    }
</script>
