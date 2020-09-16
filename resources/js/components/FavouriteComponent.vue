<template>
    <div>

            <button v-if="show" @click.prevent="unsave()" style="width: 100%;" class="btn btn-primary">UnSave</button>

            <button v-else @click.prevent="save()" style="width: 100%;" class="btn btn-dark">Save</button>


    </div>
</template>

<script>
    export default {
        props:['artworkid', 'favorited'],

        data() {
            return {
                'show': true
            }
        },
        mounted() {
            this.show = this.artworkFavorited ? true:false;
        },
        computed: {
            artworkFavorited(){
                return this.favorited
            }
        },
        methods: {
            save() {
                axios.post('/save/'+this.artworkid).then(response=>this.show=true).catch(error=>alert('error'))
            },
            unsave() {
                axios.post('/unsave/'+this.artworkid).then(response=>this.show=false).catch(error=>alert('error'))
            }
        }
    }
</script>