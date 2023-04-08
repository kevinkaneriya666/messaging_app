<template>
    <table id="user_table">
        <thead>
            <th>Name</th>
            <th>Email</th>            
        </thead>
        <tbody>
            <template v-if="loading == true">
                <h1>Data is being loaded please wait!</h1>
            </template>
            <template v-else>
                <tr v-for="user in users">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>
    import axios from "axios";

    export default {
        name: 'third',
        props: [],
        data() {
            return {
                users: '',
                loading: false
            }
        },
        methods: {
            
        },
        mounted() {
            this.loading = true;
            setTimeout(function(){
                axios.post('/fetch-users').then(
                    response => {                    
                        this.loading = false;
                        this.users = response.data;
                    }
                );
            },2000);                
        }
    }
</script>