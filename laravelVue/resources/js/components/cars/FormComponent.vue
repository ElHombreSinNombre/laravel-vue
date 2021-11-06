<template>
    <div class="center">
        <div
            class="w-1/2 bg-white rounded p-8 m-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">
                {{editing == true ?  'Update ' : 'Create'}}</h1>
            <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                <div v-for="(v, k) in errors" :key="k">
                    <p v-for="error in v" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>
            <div class="grid-4">
                <label class="label" for="model">Model</label>
                <input class="formInput" type="text" name="model" v-model="form.model" maxlength="50"
                    placeholder="Model...">
            </div>
            <div class="grid-4">
                <label class="label" for="brand">Brand</label>
                <input class="formInput" type="text" name="brand" v-model="form.brand" maxlength="12"
                    placeholder="Brand...">
            </div>
            <div class="grid-4">
                <label class="label" for="color">Color</label>
                <input class="formInput" type="color" name="color" maxlength="7" v-model="form.color">
                <div :title="form.color" class="rounded-lg cursor-help mt-4 w-24 "
                    :style="{ backgroundColor: form.color, padding:15}"></div>
            </div>
            <div class="grid-4">
                <label class="label" for="license">License</label>
                <input class="formInput" type="license" name="license" maxlength="7" v-model="form.license"
                    placeholder="License...">
            </div>
            <button @click="editing == true ? update(car.id) : store()"
                class="w-full bg-blue-400 hover:bg-blue-600 transition duration-500 ease-in-out text-white p-3 rounded"
                type="submit">{{editing == true ? 'Update' : 'Create'}}</button>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'CarsForm',
        props: ['car'],
        data: function () {
            return {
                form: {
                    model: '',
                    brand: '',
                    color: '#000000',
                    license: '',
                    image: 'https://source.unsplash.com/random'

                },
                editing: false,
                errors: null,
            }
        },
        mounted() {
            if (this.car) {
                this.form = this.car
                this.editing = true
            }
        },
        methods: {
            store: function () {
                axios.post("/cars", this.form)
                    .then(() => {
                        this.$swal({
                            title: "Car created",
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
                            window.location.href = "/cars";
                        })
                    }).catch((e) => {
                        console.log(e);
                        if (e.response.status == 500) {
                            if (e.response.data.message == "Duplicate unique values") {
                                this.$swal({
                                    title: "License already exist",
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
                axios.patch("/cars/" + id, this.form)
                    .then(() => {
                        this.$swal({
                            title: "Car update",
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
                            window.location.href = "/cars";
                        })
                    }).catch((e) => {
                        console.log(e);
                        if (e.response.status == 500) {
                            if (e.response.data.message == "Duplicate unique values") {
                                this.$swal({
                                    title: "License already exist",
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
            }
        }
    }

</script>
