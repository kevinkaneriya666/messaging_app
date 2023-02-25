<template>
    <input v-on:input="getValue" type="text" id="name" />
    <!-- <input v-on:keyup="getValue" type="text" id="name" /> -->
    <input type="text" id="id" />
    <h2>{{ name }}</h2>
    <h2>{{ password }}</h2>
    <h1>Prop printed here: {{ userName }}</h1>
    <p>Please click bellow button to populete input boxes</p>
    <button @click="add">Add</button>
    <br>
    <br>
    <br>
    <ul v-for="data in objectData">
        <li v-if="data.price > 200"> 
            Book Title: {{ data.title }} / Price: {{ data.price }}
        </li>
    </ul>

    <h2>{{ textData }}</h2>
    <input type="text" ref="input_1" v-model="textData" />    
</template>

<script>
    export default {
        name: 'index',
        props: ['id','userName','objectData'],
        data() {
            return {
                name: '',
                password: '123456'
            }
        },
        methods: {
            getValue(event) {
                //this.name = event.target.value;
                this.password = event.target.value;
                //this.$refs.input.focus()
            },
            add(event) {
                document.getElementById('id').value = this.id;
                document.getElementById('name').value = this.userName;                
            }
        },
        mounted() {
            this.$refs.input_1.focus()
        }
    }
</script>