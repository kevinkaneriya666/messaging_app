<template>
    <input v-on:keyup="getValue" type="text" id="name" />
    <h2>{{ name }}</h2>
</template>

<script>
    export default {
        name: 'index',
        data() {
            return {
                name: ''                       
            }
        },                
        methods: {
            getValue(event) {
                this.name = event.target.value; //get input value
                //this.name = event.target.getAttribute('type');  get input attribute
            }                    
        },
        mounted() {
            
        }
    }
</script>