<template>
    <div class="users">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
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
                <tr v-if="error" class="error">
                    <th>{{ error }}</th>
                </tr>
                <tr v-if="users" v-for="user in users">
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
                        <router-link :to="{ name: 'users.edit', params: { id: user.id }}" class="btn btn-primary">Edit</router-link>
                        <a href="" class="btn btn-danger" v-on:click="deleteUser(user.id, index)">Delete</a>
                    </th>
                </tr>
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            <button class="mr-2" :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
            {{ paginatonCount }}
            <button class="ml-2" :disabled="! nextPage" @click.prevent="goToNext">Next</button>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';

    const getUsers = (page, callback) => {
        const params = {page};
        axios.get('/api/users', {params}).then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
    };
    export default {
        data() {
            return {
                users: null,
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            };
        },
        computed: {
            nextPage() {
                if (!this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (!this.meta || this.meta.current_page === 1) {
                    return;
                }
                return this.meta.current_page - 1;
            },
            paginatonCount() {
                if (!this.meta) {
                    return;
                }
                const {current_page, last_page} = this.meta;
                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter(to, from, next) {
            getUsers(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate(to, from, next) {
            this.users = this.links = this.meta = null
            getUsers(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'users.index',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, {data: users, links, meta}) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.users = users;
                    this.links = links;
                    this.meta = meta;
                }
            },
            deleteUser(id, index) {
                axios.delete('/api/users/' + id).then(response => {
                    console.log(response);
                    this.getUsers();
                }).catch(error => console.log(error))
            },
        }
    }
</script>