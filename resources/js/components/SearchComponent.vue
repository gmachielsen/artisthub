<template>
    <div>
        <input type="text" placeholder="Zoek naar kunstwerk..." v-model="keyword"  v-on:keyup="searchArtworks" class="form-control">
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a :href=" '/artworks/' + result.id + '/'+result.slug+'/' "> 
                    <br>
                        <div>
                            <img :src="'/uploads/artworks/'+result.picture" alt="image" width="100px" />
                            <p>{{ result.title }}</p>
                        </div>
                     </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                keyword:'',
                results:[],
            }
        },
        methods:{
            searchArtworks(){
                this.results = [];
                if(this.keyword.length > 1) {
                    axios.get('/kunstwerken/zoeken', {params:{keyword:this.keyword}}).then(
                        response => {
                            this.results = response.data;
                        }
                    );
                }
            }
        }
    }
</script>
