<template>
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" v-bind:src="'https://www.tutorialsplane.com/wp-content/uploads/2018/02/27867786_1714460465242017_6847995972742989230_n.jpg'" alt="logo">
        <div class="card-body">
            <h5 class="card-title">{{expert.name}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <button class="btn btn-primary">More <font-awesome-icon icon="arrow-down"/></button>
        </div>
    </div>
</template>

<script>
    export  default {

        data() {

        },
        props:['expert']
    }
</script>