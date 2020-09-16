<template>
    <div>
        <input type="text" v-model="keyword" placeholder="Zoek naar kunstwerk..." v-on:keyup="Searchartworks()" class="form-control">
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            Searchartworks(){
                
            }
        }
    }
</script>
