<template>
    <input v-on:keyup="getValue" type="text" id="name" />
    <input type="text" id="id" />
    <h2>{{ name }}</h2>
    <h1>Prop printed here: {{ userName }}</h1>
    <p>Please click bellow button to populete input boxes</p>
    <button @click="add">Add</button>
</template>

<script>
    export default {
        name: 'index',
        props: {
            id: {
                type: Number,
            },
            userName: {
                type: String,
            },            
        },
        data() {
            return {
                name: ''
            }
        },
        methods: {
            getValue(event) {
                this.name = event.target.value;
            },
            add(event) {
                document.getElementById('id').value = this.id;
                document.getElementById('name').value = this.userName;                
            }
        },
        mounted() {
            
        }
    }
</script>