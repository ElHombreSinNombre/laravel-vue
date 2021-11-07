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
            <img v-if="form.image" :src="form.image" class="object-cover h-60 w-full rounded align-middle border-none">
            <div :class="imageName ? 'border-dotted  border-2 border-black' : null" class="my-5 bg-white">
                <div class="relative h-48 rounded-lg bg-gray-100 flex justify-center items-center">
                    <div class="absolute">
                        <div class="flex flex-col items-center"> <i class="fas fa-4x text-gray-400"
                                :class="imageName ? 'fa-image' : ' fa-folder-open'"></i> <span
                                class="block text-gray-400 font-normal">
                                {{imageName ? imageName :  editing == true ?  'Update car image ' : 'New car image'}}</span>
                        </div>
                    </div>
                    <input :title="form.image ? 'File has been selected' : 'Select file'" type="file"
                        class="h-full w-full opacity-0 cursor-pointer" name="image"
                        accept="image/jpg, image/png, image/gif, image/jpeg" @change="getImage($event)">
                </div>
            </div>
            <div v-if="form.image" class="flex items-center justify-center w-full my-4">
                <label for="deleteImage" class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" id="deleteImage" class="sr-only deleteImage" @change="removeImage()">
                        <div class="block bg-gray-200 w-14 h-8 rounded-full"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                    </div>
                    <div class="ml-3 text-gray-700 font-medium">
                        Remove image
                    </div>
                </label>
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
                    image: ''

                },
                imageName: '',
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
            removeImage: function () {
                this.form.image = '';
            },
            getImage: function (event) {
                this.imageName = event.target.files[0].name.split(".")[0];
                this.form.image = URL.createObjectURL(event.target.files[0]);
            },
            store: function () {
                const createForm = new FormData();
                createForm.append('image', this.form.image);
                createForm.append('model', this.form.model);
                createForm.append('brand', this.form.brand);
                createForm.append('color', this.form.color);
                createForm.append('license', this.form.license);
                axios.post("/cars", createForm, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
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
                const updateForm = new FormData();
                updateForm.append('image', this.form.image);
                updateForm.append('model', this.form.model);
                updateForm.append('brand', this.form.brand);
                updateForm.append('color', this.form.color);
                updateForm.append('license', this.form.license);
                updateForm.append('_method', 'PATCH')
                axios.post("/cars/" + id, updateForm, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
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
