<template>
    <div>
        <h2 class="text-center">Lista de grupos</h2>

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
            <tr v-for="group in groups" :key="groups.id">
                <td>{{ group.id }}</td>
                <td>{{ group.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-group', params: { id: group.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteGroup(group.id)">Delete</button>
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
                groups: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/groups/')
                .then(response => {
                    this.groups = [...response.data.groups];
                });
        },
        methods: {
            deleteGroup(id) {
                this.axios
                    .delete(`http://localhost:8000/api/groups/${id}`)
                    .then(response => {
                        let i = this.groups.map(data => data.id).indexOf(id);
                        this.groups.splice(i, 1)
                    });
            }
        }
    }
</script>
