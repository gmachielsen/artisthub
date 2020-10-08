<template>
    <p>{{ artworks }}</p>
</template>

<script>
    export default {
        data () {
            return {
                artworks: []
            }
        },
        mounted () {
            axios.get('/api/kunstwerken').then((response) => {
                this.artworks = response.data.data
            }).catch((error) => this.errors = error.response.data.errors)
        }
    }
</script>