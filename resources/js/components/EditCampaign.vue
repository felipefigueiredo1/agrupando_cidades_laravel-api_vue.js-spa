<template>
    <div>
        <h3 class="text-center">Editar campanha</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCampaign">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" v-model="campaign.name">
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
                <tr v-for="(group, index) in groups" :key="index" >
                    <td>{{ group.id }}</td>
                    <td>{{ group.name }}</td>
                    <td>{{ group }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <router-link :to="{ name: 'edit-group', params: { id: group.id } }" class="btn btn-success">
                                Editar</router-link>
                            <button class="btn btn-danger" @click="deleteGroupCampaign(group.id)">Deletar</button>
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
            campaign: {},
            groups: [],
        }
    },
    created() {
        this.axios
            .get(`http://localhost:8000/api/campaigns/${this.$route.params.id}`)
            .then((res) => {
                console.log(res)
                this.campaign = res.data.campaign;
                this.groups = [...res.data.groups];
            });
    },
    methods: {
        updateCampaign() {
            this.axios
                .patch(`http://localhost:8000/api/campaigns/${this.$route.params.id}`, this.campaign)
                .then((res) => {
                    this.$router.push({ name: 'campaigns' });
                });
        },
        deleteGroupCampaign(id) {
            this.axios
                .delete(`http://localhost:8000/api/campaigns-groups/${id}`)
                .then(response => {
                        let i = this.groups.map(data => data.id).indexOf(id);
                        this.groups.splice(i, 1)
                    });
        }
    }
}
</script>
