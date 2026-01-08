<template>
    <div class="center">
        <div
            class="w-1/2 bg-white rounded p-8 m-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">
                {{editing == true ? 'Update' :'Create'}}</h1>
            <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                <div v-for="(v, k) in errors" :key="k">
                    <p v-for="error in v" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>
            <div class="grid-4">
                <label class="label" for="name">Name</label>
                <input class="formInput" type="text" name="name" v-model="form.name" maxlength="50"
                    placeholder="Name...">
            </div>
            <div class="grid-4">
                <label class="label" for="last_name">Last Name</label>
                <input class="formInput" type="text" name="lastname" v-model="form.lastname" maxlength="12"
                    placeholder="Lastname...">
            </div>
            <div class="grid-4">
                <label class="label" for="age">Age</label>
                <input class="formInput" type="number" min="18" max="99" name="age" v-model="form.age"
                    placeholder="Age...">
            </div>
            <div class="grid-4">
                <label class="label" for="dni">DNI</label>
                <input class="formInput" type="text" name="dni" v-model="form.dni" maxlength="9" placeholder="DNI...">
            </div>
            <div class="grid-4">
                <label class="label" for="email">Email</label>
                <input class="formInput" type="email" name="email" v-model="form.email" maxlength="24"
                    placeholder="Email...">
            </div>
            <div class="grid-4">
                <label class="label" for="car">Cars</label>
                <v-select name="car" placeholder="Select car..." :options="options" v-model="form.id_car" label="model"
                    :reduce="model => model.id"></v-select>
            </div>
            <p v-if="!options.length" class="bg-blue-500 text-white py-2 px-5 pr-0 rounded font-bold mb-4 shadow-l" >
                <a :href="'/cars/create'">No free cars for select. Need to create new one. </a>
            </p>
            <button @click="editing== true ?  update(person.id) : store()"
                class="w-full bg-blue-400 hover:bg-blue-600 transition duration-500 ease-in-out text-white p-3 rounded"
                type="submit">
                {{editing == true ? 'Update' :'Create'}}
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PeopleForm',
        props: ['person', 'cars'],
        data: function () {
            return {
                form: {
                    name: '',
                    lastname: '',
                    age: '',
                    dni: '',
                    email: '',
                    id_car: '',
                },
                editing: false,
                errors: null,
                options: []
            }
        },
        mounted() {
            if (this.person) {
                this.form = this.person
                this.editing = true
            }
            if (this.options) {
                this.options = this.cars
            }
        },
        methods: {
            store: function () {
                axios.post("/people", this.form)
                    .then(() => {
                        this.$swal({
                            title: "Person created",
                            icon: 'success',
                            toast: true,
                            showConfirmButton: false,
                            position: 'top-end',
                            timerProgressBar: true,
                            timer: 5000,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', this.$swal.stopTimer)
                                toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                            }
                        }).then(() => {
                            window.location.href = "/people";
                        })
                    }).catch((e) => {
                        console.log(e);
                        if (e.response.status == 500) {
                            if (e.response.data.message == "Duplicate unique values") {
                                this.$swal({
                                    title: "Email or DNI already exist",
                                    icon: 'error',
                                    toast: true,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    timerProgressBar: true,
                                    timer: 5000,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', this.$swal.stopTimer)
                                        toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                                    }
                                })
                            }
                        }
                        this.errors = e.response.data.errors;
                    });
            },
            update: function (id) {
                axios.patch("/people/" + id, this.form)
                    .then(() => {
                        this.$swal({
                            title: "Person updated",
                            icon: 'success',
                            toast: true,
                            showConfirmButton: false,
                            position: 'top-end',
                            timerProgressBar: true,
                            timer: 5000,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', this.$swal.stopTimer)
                                toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                            }
                        }).then(() => {
                            window.location.href = "/people";
                        })
                    }).catch((e) => {
                        console.log(e);
                        if (e.response.status == 500) {
                            if (e.response.data.message == "Duplicate unique values") {
                                this.$swal({
                                    title: "Email or DNI already exist",
                                    icon: 'error',
                                    toast: true,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    timerProgressBar: true,
                                    timer: 5000,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })
                            }
                        }
                        this.errors = e.response.data.errors;
                    });
            }
        }
    }

</script>
