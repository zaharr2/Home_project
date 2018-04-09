<template>
    <div>
        <h2>Users listing</h2>
        <a href="/users/create" class="btn btn-success pull-right">Add new user</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>NICKNAME</th>
                <th>SECONDNAME</th>
                <th>AGE</th>
                <th>EMAIL</th>
                <th>SEX</th>
                <th>ROLE</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <th>{{ user.id }}</th>
                <th>{{ user.name }}</th>
                <th>{{ user.nicname }}</th>
                <th>{{ user.second_name }}</th>
                <th>{{ user.age }}</th>
                <th>{{ user.email }}</th>
                <th>{{ user.sex }}</th>
                <th v-if="user.role === 1">User</th>
                <th v-else>Admin</th>
                <th>
                    <a :href="'/users/' + user.id + '/edit'" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                users: [],
                user: {
                    id: '',
                    name: '',
                    email: ''
                }
            }
        },
        name: "Users",
        mounted() {
            this.getUsers();
        },
        methods: {
            getUsers() {
                axios.get('/api/users')
                    .then(response => {
                        console.log(response);
                        this.users = response.data;
                    });
            }
        }
    }
</script>

<style scoped>

</style>