<template>
<div>

    <form
            id="app"
            @submit="checkForm"
            action="https://vuejs.org/"
            method="post"
    >



        <p>
            <label for="date">date</label>
            <input
                    id="date"
                    v-model="start_time"
                    type="date"
                    name="date"
            >
        </p>

        <p>
            <label for="Duration">Duration</label>
            <select
                    id="Duration"
                    v-model="Duration"
                    name="Duration"
            >
                <option   v-for="duration in durations" v-bind:value="duration.key">
                    {{duration.key}}
                </option>

            </select>

        </p>

        <p>
            <label for="Time slot">Time Slot</label>
            <select v-on:click="checkTime('09:50:00','10:50:00',Duration)"
                    id="Time slot"
                    v-model="time_slot"
                    name="movie"
            >
                <option v-for="time_slot in Time_slots" v-bind:value="time_slot">{{time_slot}}</option>
            </select>

        </p>
        <p>
            your appointment : {{this.start_time}} {{this.time_slot}}
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

        data() {
            return {
                errors: [],
                Duration:null,
                start_time: null,
                durations: [
                    {key:'15'},{key:'30'},{key:'60'}
                    ],
                Time_slots: [],
                time_slot:null

            }
        },
        methods:{
            checkForm: function (e) {
                if (this.name && this.age) {
                    return true;
                }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('Name required.');
                }
                if (!this.age) {
                    this.errors.push('Age required.');
                }

                e.preventDefault();
            },
            checkTime(start_time , end_time ,duration){
                var timesolt =[start_time];

                function addMinutes(time, minutes) {
                    let date = new Date(new Date('01/01/2015 ' + time).getTime() + minutes * 60000);
                    let tempTime = ((date.getHours().toString().length == 1) ? '0' + date.getHours() : date.getHours()) + ':' +
                        ((date.getMinutes().toString().length == 1) ? '0' + date.getMinutes() : date.getMinutes()) + ':' +
                        ((date.getSeconds().toString().length == 1) ? '0' + date.getSeconds() : date.getSeconds()) ;

                    console.log(tempTime);
                    return tempTime;
                }
                let end;
                while (start_time != end_time && end != end_time ) {

                    start_time = addMinutes(start_time, duration);
                    end = addMinutes(start_time,duration);
                    timesolt.push(start_time +' - '+ end);

                }
                this.Time_slots =timesolt;
                console.log(timesolt);
            }
        }
    }
</script>