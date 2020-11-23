<template>
    <!--<expert-component v-for="expert in experts" v-bind:expert="expert"></expert-component>-->
    <div class="container">
        <div class="row">
            <div v-for="expert in experts" class="col-md-4">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="../images/logo.png" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{expert.name}}</h4>
                    </div>
                    <VueSlideToggle ref="expertDetails" :data-expert-id="expert.id" :open="open" tag="section" :duration="500">
                        <ul  class="list-group list-group-flush">
                            <li class=" list-group-item">Specialization: {{expert.expert}}</li>
                            <li class="list-group-item">Country: {{expert.country}}</li>
                            <li class="list-group-item">Work Time: {{expert.start_time }} - {{ expert.end_time}}</li>
                        </ul>

                    </VueSlideToggle>
                    <VueSlideToggle ref="booking" :data-expert-id="expert.id" :open="open" tag="section" :duration="500">

                          <booking-component v-bind:expert_id="expert.id" ></booking-component>

                    </VueSlideToggle>
                    <div class="card-body">
                        <button class="btn btn-primary" v-on:click="greet(expert.id)" >More <font-awesome-icon icon="arrow-down"/></button>
                        <button class="btn btn-primary" v-on:click="check(expert.id)" >Booking <font-awesome-icon icon="arrow-down" /></button>
                    </div>

                </div>
            </div>

        </div>
    </div>



</template>

<script>
    import axios from 'axios'
    import { VueSlideToggle } from 'vue-slide-toggle';

    export default {
        props:['open'],

        data() {
            return {
                experts: [],
                expert:[]
            }
        },
        created:function () {
            this.getItem()

        },

        methods:{
            // details(){
            //
            //     let uri = '/api/experts/{'+ expert.id +'}';
            //     axios.get(uri).then((response) => {
            //         this.expert = response.data;
            //     });
            //
            // },
            getItem()
            {
                let uri = '/auth/experts';
                axios.get(uri).then((response) => {
                    this.experts = response.data;
                });
            },
            greet(expertid){
                 this.ul = this.$refs["expertDetails"];
                console.log(this.ul[expertid]);
               this.ul[expertid-1].open = ! this.ul[expertid-1].open ;
            },
            check(expertid){
                this.bookingcomponent = this.$refs["booking"];
                console.log(this.bookingcomponent[expertid]);
                this.bookingcomponent[expertid-1].open = ! this.bookingcomponent[expertid-1].open ;


            },


        },
        components:{
            VueSlideToggle

        }



    }
</script>