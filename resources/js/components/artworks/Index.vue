<template>
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12 _leftNav">
            <filters endpoint="api/kunstwerken/filters"></filters>
                        <filters endpoint="/api/kunstwerken/filters"></filters>

        </div>
        <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                            <artwork v-for="artwork in artworks" :artwork="artwork" :key="artwork.id"></artwork>
                            <pagination :meta="meta" v-on:pagination:switched="getArtworks"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Artwork from './partials/Artwork.vue'
    import Filters from './partials/Filters.vue'
    import Pagination from '../pagination/Pagination.vue'

    export default {
        components: {
            Artwork,
            Filters,
            Pagination
        },
        data () {
            return {
                artworks: [],
                meta: {}
            }
        },
        mounted () {
            this.getArtworks()
        },
        methods: {
            getArtworks (page = this.$route.query.page) {
                axios.get('/api/kunstwerken', {
                    params: {
                        page
                    }
                }).then((response) => {
                    this.artworks = response.data.data
                    this.meta = response.data.meta
                }).catch(err=>{
                    console.log(err)
                });
            }
        }
    }
</script>