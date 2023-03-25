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
    <!-- <ul v-for="data in objectData">
        <li v-if="data.price > 200"> 
            Book Title: {{ data.title }} / Price: {{ data.price }}
        </li>
    </ul> -->

    <h2>{{ textData }}</h2>
    <input type="text" ref="input" v-model="textData" />    

    <select v-on:change="checkSelected">
        <option v-for="datas in data">{{ datas.title }}</option>
    </select>
</template>

<script>
    export default {
        name: 'index',
        props: ['id','userName','data'],
        data() {
            return {
                name: '',
                password: '123456',
                objectData: {}
            }
        },
        methods: {
            getValue(event) {
                //this.name = event.target.value;
                //this.password = event.target.value;
                this.$refs.input.value = event.target.value;
            },
            add(event) {
                document.getElementById('id').value = this.id;
                document.getElementById('name').value = this.userName;                
            },
            checkSelected(event){
                alert(event.target.value);
            }
        },
        mounted() {
            // this.objectData =  [{
            //                     'title' : 'Mehula',
            //                     'price' : 300
            //                 },
            //                 {
            //                     'title' : 'Kauff',
            //                     'price' : 230
            //                 },
            //                 {
            //                     'title' : 'Devil Returns',
            //                     'price' : 500
            //                 }]
            this.$refs.input.focus()

        }
    }
</script>