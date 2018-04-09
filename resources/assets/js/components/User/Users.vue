<template>
    <div>
        <h2>Users listing</h2>
        <a href="/users/create" class="btn btn-success pull-right">Add new user</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>NAame</th>
                <th>Nickname</th>
                <th>Secondname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Sex</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users">
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
                    <a href="" class="btn btn-danger" v-on:click="deleteUser(user.id, index)">Delete</a>
                </th>
            </tr>
            </tbody>
        </table>
        <div class="pagination">
            <button class="btn btn-default" v-on:click="fetchPaginateUsers(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">Previos</button>
            <span>Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
            <button class="btn btn-default" v-on:click="fetchPaginateUsers(pagination.next_page_url)" :disabled="!pagination.next_page_url">Next</button>
        </div>
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
                },
                url: '/api/users',
                pagination: []
            }
        },
        name: "Users",
        mounted() {
            this.getUsers();
        },
        methods: {
            getUsers() {
                let $this = this;
                axios.get(this.url).then(response => {
                    console.log(response);
                    this.users = response.data.data;
                    $this.makePagination(response.data);
                });
            },
            deleteUser(id, index) {
                axios.delete('/api/users/' + id).then(response => {
                    console.log(response);
                    this.users.splice(index, 1);
                }).catch(error => {
                    console.log(error);
                });
            },
            makePagination(data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url
                };
                this.pagination = pagination;
            },
            fetchPaginateUsers(url) {
                this.url = url;
                this.getUsers();
            }
        }
    }
</script>

<style scoped>

</style>