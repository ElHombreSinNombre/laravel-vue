<template>
    <div class="relative py-16 bg-blueGray-50 h-screen w-screen grid place-items-center">
        <div class="w-full mb-12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out
      text-black">
                <div class="rounded-t px-4 py-3  bg-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                            <a href="/choose"
                                class="cursor-pointer fas fa-arrow-circle-left opacity-50 hover:opacity-100 transition duration-500 ease-in-out"></a>
                            <b class="font-semibold text-lg ">
                                Cars</b>
                        </div>
                        <input type="text" v-model="search"
                            class="w-2/3 shadow appearance-none border rounded py-1 px-3 text-gray-700 m-auto"
                            placeholder="Filter..." />
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
                            <tr v-for="(car, index) in filterItems" :key="car.id">
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
        name: 'CarsTable',
        data: function () {
            return {
                list: this.cars,
                search: ''
            }
        },
        computed: {
            filterItems: function () {
                return this.filters()
            },
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
                    title: "Are you sure that you want delete item?",
                    text: "People with that car will be removed",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#f44336",
                    confirmButtonText: "Sí",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value == true) {
                        axios.delete("/cars/" + id)
                            .then(() => {
                                this.list.splice(index, 1);
                                this.$swal({
                                    title: "Item deleted",
                                    icon: 'success',
                                    toast: true,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    timerProgressBar: true,
                                    timer: 5000
                                })
                                axios.get("/send/" + id).then((response) => {
                                    console.log(response);
                                }).catch((error) => {
                                    console.log(error);
                                })
                            }).catch((error) => {
                                console.log(error);
                            });
                    }
                })
            },
            filters() {
                return this.list.filter(item => item.model.match(this.search.trim()) || item.brand.match(this.search.trim()) || item.color.match(this.search.trim()) || item.license.match(this.search.trim()));   
            },
        }
    };

</script>
