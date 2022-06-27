<template>
    <div>
        <h3 class="text-center">Edit Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCity">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="city.name">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                city: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/cities/${this.$route.params.id}`)
                .then((res) => {
                    this.city = res.data;
                });
        },
        methods: {
            updateCity() {
                this.axios
                    .patch(`http://localhost:8000/api/cities/${this.$route.params.id}`, this.city)
                    .then((res) => {
                        this.$router.push({ name: 'cities' });
                    });
            }
        }
    }
</script>
