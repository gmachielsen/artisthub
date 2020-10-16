<template>
    <p>{{ filters }}</p>
</template>
<script>
    export default {
        props: [
            'endpoint'
        ],
        data () {
            return {
                filters: {}
            }
        },
        mounted () {
            axios.get(this.endpoint).then((response) => {
                this.filters = response.data.data
            })
        }
    }
</script>