<template>
    <div v-if="hideShow">This is second Vue component</div>
    <button @click="takeAction">Hide/Show</button>
    <br>
    <input type="checkbox" value="1" :checked="checked" />
</template>
<script>
    export default {
        name: 'second',
        props: [],
        data() {
            return {
                hideShow: true,
                checked: true                
            }
        },
        methods: {
            takeAction(event){
                if(this.hideShow == false){
                    this.hideShow = true;
                } else{
                    this.hideShow = false;
                }                
            },
            functionTOcheck(){
                console.log('kkcoder');
            }
        },
        mounted() {
            window.setInterval(()=>{
                if(this.checked == false){
                    this.checked = true;
                } else{
                    this.checked = false;
                }
                this.functionTOcheck();
           },2000);
        }
    }
</script>