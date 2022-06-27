<template>
    <div>
        <h3 class="text-center">Editar grupo</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateGroup">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="group.name">
                        {{ group.city }}
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
                </form>
            </div>
        </div>
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
                <tr v-for="(city, index) in cities" :key="index" >
                    <td>{{ city.id }}</td>
                    <td>{{ city.name }}</td>
                    <td>{{ city }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{ name: 'edit-city', params: { id: city.id } }" class="btn btn-success">
                                Editar</router-link>
                            <button class="btn btn-danger" @click="deleteCityGroup(city.id)">Deletar</button>
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
            group: {},
            //finally: {},
            cities: [],
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/groups/${this.$route.params.id}`)
            .then((res) => {
                console.log(res)
                this.group = res.data.group;
                //this.finally = res.data.finally;
                this.cities = [...res.data.cities];
            });
    },
    methods: {
        updateGroup() {
            this.axios
                .patch(`http://localhost:8000/api/groups/${this.$route.params.id}`, this.group)
                .then((res) => {
                    this.$router.push({ name: 'groups' });
                });
        },
        deleteCityGroup(id) {
            this.axios
                .delete(`http://localhost:8000/api/groups-cities/${id}`)
                .then(response => {
                        let i = this.cities.map(data => data.id).indexOf(id);
                        this.cities.splice(i, 1)
                    });
        }
    }
}
</script>
