<template>
    <div>
        <h2 class="text-center">Lista de campanhas</h2>

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
            <tr v-for="campaign in campaigns" :key="campaigns.id">
                <td>{{ campaign.id }}</td>
                <td>{{ campaign.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit-campaign', params: { id: campaign.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteCampaign(campaign.id)">Deletar</button>
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
                campaigns: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/campaigns/')
                .then(response => {
                    this.campaigns = [...response.data.campaigns];
                });
        },
        methods: {
            deleteCampaign(id) {
                this.axios
                    .delete(`http://localhost:8000/api/campaigns/${id}`)
                    .then(response => {
                        let i = this.campaigns.map(data => data.id).indexOf(id);
                        this.campaigns.splice(i, 1)
                    });
            }
        }
    }
</script>
