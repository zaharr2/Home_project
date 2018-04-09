<template>
    <div>
        <h2>Add new user</h2>
        <form action="/users" class="form-horizontal" method="post">
            <div class="form-group">
                <label for="name" class="control-label col-sm-2">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" place-holder="Enter Name" name="name" v-model="name">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" place-holder="Enter Email" name="email" v-model="email">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="control-label col-sm-2">Name:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" place-holder="Enter Password" name="password" v-model="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-s col-sm-10">
                    <button class="btn btn-default" type="button" v-on:click="addNewUser()">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "CreateNew",
        data() {
            return {
                name: '',
                email: '',
                password: ''
            }
        },
        methods: {
            addNewUser() {
                console.log(this.name);
                console.log(this.email);
                console.log(this.password);
                axios.post('/api/users', {
                    name: this.name,
                    email: this.email,
                    password: this.password
                }).then(response => {
                    console.log(response);
                    this.name = '';
                    this.email = '';
                    this.password = '';
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>