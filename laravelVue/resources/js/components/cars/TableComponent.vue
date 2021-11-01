<template>
    <div class="relative py-16 bg-blueGray-50 h-screen w-screen grid place-items-center">
        <div class="w-full mb-12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out
      text-black">
                <div class="rounded-t px-4 py-3  bg-gray-200">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                            <h3 class="font-semibold text-lg "> <a href="/choose"
                                    class="cursor-pointer fas fa-arrow-circle-left opacity-50 hover:opacity-100 transition duration-500 ease-in-out"></a>
                                Cars</h3>
                        </div>
                        <a href="/cars/create"
                            class="text-right cursor-pointer fas fa-plus-circle opacity-50 text-black hover:text-green-600 transition duration-500 ease-in-out hover:opacity-100"></a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full border-collapse  bg-gray-100">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    Model</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    Brand</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    Color</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    License</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    Action</th>
                            </tr>

                        </thead>
                        <tbody is="transition-group" name="fade">
                            <tr v-for="(car, index) in list" :key="car.id">
                                <td class="px-6 py-3 align-middle">{{car.model}}</td>
                                <td class="px-6 py-3 align-middle">{{car.brand}}</td>
                                <td class="px-6 py-3 align-middle">{{car.color}}</td>
                                <td class="px-6 py-3 align-middle">{{car.license}}</td>
                                <td class="px-6 py-3 align-middle"><i
                                        class="cursor-pointer hover:text-blue-600 transition duration-500 ease-in-out fas fa-edit"></i>
                                    | <i @click="deleteCar(car.id, index)"
                                        class="hover:text-red-600 transition duration-500 ease-in-out cursor-pointer fas fa-trash"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                list: []
            }
        },
        created: function () {
            this.list = this.cars;
        },
        props: {
            cars: {
                type: Array,
                default: []
            },
        },
        methods: {
            deleteCar: function (id, index) {
                this.$swal({
                    title: "¿Está seguro que desea eliminar el coche?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#f44336",
                    confirmButtonText: "Sí",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value == true) {
                        axios.delete((`https://jsonplaceholder.typicode.com/posts/${id}`))
                            .then(() => {
                                this.cars.splice(index, 1);
                                this.$swal({
                                    title: "Elemento eliminado",
                                    icon: 'success',
                                    toast: true,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    timerProgressBar: true,
                                    timer: 5000
                                })
                            }).catch((error) => {
                                console.log(error);
                            });
                    }
                })
            },
        }
    };

</script>
