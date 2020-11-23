<template>
<div class="container border">

    <form class="align-content-center"
            id="app"
            @submit="checkForm(appointment)"
    >



        <p>
            <label for="date">date</label>
            <input
                    id="date"
                    v-model="appointment.start_time"
                    type="date"
                    name="date"
            >
        </p>

        <p>
            <label for="Duration">Duration</label>
            <select
                    id="Duration"
                    v-model="appointment.Duration"
                    name="Duration"
            >
                <option   v-for="duration in durations" v-bind:value="duration.key">
                    {{duration.key}}
                </option>

            </select>

        </p>

        <p>
            <label for="Time slot">Time Slot</label>
            <select v-on:click="checkTime(expert.start_time,expert.end_time,appointment.Duration)"
                    id="Time slot"
                    v-model="appointment.time_slot"
                    name="movie"
            >
                <option v-for="time_slot in Time_slots" v-bind:value="time_slot">{{time_slot}}</option>
            </select>

        </p>
        <p class="align-content-center" style="color: #113049; font-size: 16px" v-if="appointment.time_slot != null">
            your appointment : {{this.appointment.start_time}} {{this.appointment.time_slot}}
        </p>
        <p>
            <input class="btn btn-success"
                    type="submit"
                    value="Submit"
            >
        </p>

    </form>


</div>
</template>

<script>


    export default  {
        props:['expert_id'],
        data() {
            return {
                errors: [],
                expert:[],
                // Duration:null,
                // start_time: null,
                durations: [
                    {key:'15'},{key:'30'},{key:'60'}
                    ],
                Time_slots: [],
                // time_slot:null,
                appointment:{
                    start_time:null,
                    Duration:null,
                    time_slot:null,

                },
            }
        },
        computed:{
            now: function () {
                return Date.now()
            }
        },
        mounted:function () {
            this.details();
        },
        methods:{
            details(){
                    let uri = '/auth/experts/'+this.expert_id;
                    axios.get(uri).then((response) => {
                        this.expert = response.data;
                        console.log(this.expert);
                    });
            },
            checkForm() {
                let uri = '/auth/experts/'+this.expert_id;
               axios.post(uri,appointment).then(res =>{
                  console.log(res.data);
               })
            },
            checkTime(start_time , end_time ,duration){
                let timesolt =[];

                function addMinutes(time, minutes) {
                    let date = new Date(new Date('01/01/2015 ' + time).getTime() + minutes * 60000);
                    let tempTime = ((date.getHours().toString().length == 1) ? '0' + date.getHours() : date.getHours()) + ':' +
                        ((date.getMinutes().toString().length == 1) ? '0' + date.getMinutes() : date.getMinutes()) + ':' +
                        ((date.getSeconds().toString().length == 1) ? '0' + date.getSeconds() : date.getSeconds()) ;

                    console.log(tempTime);
                    return tempTime;
                }

                while (start_time !== end_time  ) {

                    if (start_time === "02:45:00"){
                        start_time = "03:00:00";
                        timesolt.push(start_time);
                        start_time = addMinutes(start_time, duration);
                        timesolt.push(start_time)
                    }else {
                        start_time = addMinutes(start_time, duration);
                        timesolt.push(start_time);

                    }


                }
                this.Time_slots =timesolt.slice(0,-1);

            },

        }
    }
</script>