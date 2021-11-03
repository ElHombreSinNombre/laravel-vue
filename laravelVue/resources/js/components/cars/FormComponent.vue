<template>
    <div class="relative py-16 bg-blueGray-50 h-screen w-screen grid place-items-center">
        <div
            class="w-1/2 bg-white rounded p-8 m-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">{{this.car!=null ?  'Update '+ this.car.model : 'Create'}}</h1>
            <form action="/">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="model">Model</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="model" v-model="model"
                        placeholder="Model...">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="brand">Last Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="brand" v-model="brand"
                        placeholder="Brand...">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="color">Color</label>
                    <input class="border py-2 px-3 text-grey-800" type="color" name="color" v-model="color">{{color}}
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="license">License</label>
                    <input class="border py-2 px-3 text-grey-800" type="license" name="license" v-model="license"
                        placeholder="License...">
                </div>
                <button @click="this.car!=null ? update(this.car.id) : create()"
                    class="w-full bg-blue-400 hover:bg-blue-600 transition duration-500 ease-in-out text-white p-3 rounded"
                    type="submit">{{this.car!=null ? 'Update' : 'Create'}}</button>
            </form>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'CarsForm',
             data: function () {
                return {
                    model:this.car!=null ? this.car.model : '',
                    brand:this.car!=null ? this.car.brand : '',
                    color:this.car!=null ? this.car.color : '',
                    license: this.car!=null ? this.car.license : '',
                }
            },
        props: {
            car: {
                type: [],
                default: ''
            },
        },
        methods: {
            store: function () {
                axios.post("/people/", 'XXX')
                    .then(() => {
                        console.log(response)
                    }).catch((error) => {
                        console.log(error);
                    });
            },
            update: function (id) {
                axios.patch("/people/" + id, 'XXX')
                    .then(() => {
                        console.log(response)

                    }).catch((error) => {
                        console.log(error);
                    });
            }
        }
    }

</script>
