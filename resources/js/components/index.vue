<template>
    <input v-on:input="getValue" type="text" id="name" />
    <!-- <input v-on:keyup="getValue" type="text" id="name" /> -->
    <input type="text" id="id" />
    <h2>{{ name }}</h2>
    <h2>{{ password }}</h2>
    <h1>Prop printed here: <span v-bind:style="{ color: computedColor, fontSize: computedSize}">{{ userName }}</span></h1>
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

    <select v-on:change="checkColor">
        <option value="">Select Any One...</option>
        <option v-for="color in colors" v-bind:value="color.color">{{ color.title }}</option>
    </select>
</template>

<script>
    export default {
        name: 'index',
        props: ['id','userName','colors'],
        data() {
            return {
                name: '',
                password: '123456',
                objectData: {},
                computedColor: '',
                computedSize: 15
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
            checkColor(event){
                //this.$refs.input.value = event.target.value;
                this.computedColor = event.target.value;
                this.computedSize = this.computedSize + 20 + 'px';
            }
        },
        mounted() {
            //this.objectData =  [{'title' : 'Mehula','price' : 300},{'title' : 'Kauff','price' : 230},{'title' : 'Devil Returns','price' : 500}]
            this.$refs.input.focus()

        }
    }
</script>