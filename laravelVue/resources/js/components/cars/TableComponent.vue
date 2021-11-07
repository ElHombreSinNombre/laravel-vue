<template>
    <div class="center">
        <div class="w-full mb-12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out
      text-black">
                <div class="rounded-t px-4 py-3  bg-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                            <b class="font-semibold text-lg ">
                                Cars</b>
                        </div>
                        <input type="text" v-model="search"
                            class="w-2/3 shadow appearance-none border rounded py-1 px-3 text-gray-700 m-auto"
                            placeholder="Filter..." />
                        <a v-if="isAdmin==true" title="New car" href="/cars/create"
                            class="text-right cursor-pointer fas fa-plus-circle opacity-50 text-black hover:text-green-600 transition duration-500 ease-in-out hover:opacity-100"></a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full border-collapse  bg-gray-100">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Car image</th>
                                <th>Car model</th>
                                <th>Car brand</th>
                                <th>Car color</th>
                                <th>Car license</th>
                                <th v-if="isAdmin==true">Action</th>
                            </tr>
                        </thead>
                        <tbody is="transition-group" name="fade">
                            <tr v-for="(car, index) in filterItems" :key="car.license">
                                <td>{{car.dni || '-'}}</td>
                                <td v-if="car.image"><img title="Show" @click="goTo(car.image)" :src="car.image" 
                                        class="object-cover h-12 w-12 cursor-pointer opacity-50 hover:opacity-100 rounded align-middle border-none">
                                </td>
                                <td v-else> - </td>
                                <td>{{car.model || '-'}}</td>
                                <td>{{car.brand || '-'}}</td>
                                <td v-if="car.color" :title="car.color">
                                    <div class="rounded-lg cursor-help"
                                        :style="{ backgroundColor: car.color, padding:15}"></div>
                                </td>
                                <td v-else> - </td>
                                <td>{{car.license || '-'}}</td>
                                <td v-if="isAdmin==true"><a title="Edit" :href="'/cars/'+ car.id +'/edit'"
                                        class="hover:text-blue-600 action fas fa-edit"></a>
                                    | <i title="Delete" @click="deleteCar(car, index)"
                                        class="hover:text-red-600 action fas fa-trash"></i>
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
        props: ['cars', 'user'],
        data: function () {
            return {
                search: '',
                list: this.cars,
            }
        },
        computed: {
            isAdmin() {
                if (this.user.role=='admin') {
                    return true
                } else{
                    return false
                }
            },
            filterItems: function () {
                return this.filters()
            },
        },
        methods: {
            goTo: function (url) {
                window.open(
                    url,
                    '_blank'
                );
            },
            deleteCar: function (car, index) {
                this.$swal({
                    title: "Are you sure that you want delete " + car.model + "?",
                    text: car.name!=null ? car.name +  " will be removed":null,
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#f44336",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value == true) {
                        axios.get("/send/" + car.id).then(() => {
                            axios.delete("/cars/" + car.id)
                                .then(() => {
                                    this.list.splice(index, 1);
                                    this.$swal({
                                        title: car.model + ' deleted',
                                        icon: 'success',
                                        toast: true,
                                        showConfirmButton: false,
                                        position: 'top-end',
                                        timerProgressBar: true,
                                        timer: 5000,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter',
                                                this.$swal.stopTimer)
                                            toast.addEventListener('mouseleave',
                                                this.$swal.resumeTimer)
                                        }
                                    })
                                }).catch((e) => {
                                    console.log(e);
                                })
                        }).catch((e) => {
                            console.log(e);
                        });
                    }
                })
            },
            filters() {
                return this.list.filter(item => item.model?.match(this.search.trim()) || item.brand?.match(this
                    .search
                    .trim()) || item.color?.match(this.search.trim()) || item.license?.match(this.search
                    .trim()));
            },
        }
    };

</script>
