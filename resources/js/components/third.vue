<template>
    <table>
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

    <form ref="forms" v-on:submit="submit">
        <input type="text" v-model="name" placeholder="Enter Name" />
        <input type="email" v-model="email" placeholder="Enter Email" />
        <input type="password" v-model="password" placeholder="Enter Password" />
        <input type="submit" value="Submit" />
    </form>
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
            submit(event) {
                event.preventDefault();
                var payload = {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }
                axios.post('/store-users',payload).then(
                    response => {                        
                        this.$refs.forms.reset();
                        this.users.push(response.data.response);                        
                    }
                );
            }
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