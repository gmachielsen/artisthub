<template>
    <div class="b-col-12 b-col-sm-6 b-col-md-4 b-col-lg-3 b-col-xl-2">
        <div class="card" style="">
            <div class="card-body">
                <h5 class="card-title">{{ artwork.title }}</h5>
                <p>€ {{ artwork.price }} / € {{ artwork.rent }}</p>
                <ul v-if="artwork.category">
                    <li v-for="category in artwork.category">{{ category.name }}</li>

                </ul>
                <ul>
                    <li>
                        {{ artwork.formattedCategory }}  
                    </li>
                    <li>
                        {{ artwork.formattedStyle }}
                    </li>
                    <li>
                        {{ artwork.formattedTechnic }}
                    </li>
                </ul>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    props: [
        'artwork'
    ]
}
</script>