<template>
    <table id="user_table">
        <thead>
            <th>Name</th>
            <th>Email</th>            
        </thead>
        <tbody>
            <tr v-for="user in users">
                <td>{{ user.name }}</td>
                <td>{{ user.email }}</td>
            </tr>
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
                users: ''                
            }
        },
        methods: {
            
        },
        mounted() {
            axios.post('/fetch-users').then(
                response => {                                        
                    this.users = response.data;
                }
            );                
        }
    }
</script>