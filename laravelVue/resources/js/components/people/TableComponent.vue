<template>
    <div class="center">
        <div class="w-full mb-12 px-4">
            <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out
      text-black">
                <div class="rounded-t px-4 py-3 bg-gray-200 ">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                            <b class="font-semibold text-lg ">
                                People</b>
                        </div>
                        <input type="text" v-model="search"
                            class="w-2/3 shadow appearance-none border rounded py-1 px-3 text-gray-700 m-auto"
                            placeholder="Filter..." />
                        <a title="New person" href="/people/create"
                            class="text-right cursor-pointer fas fa-plus-circle opacity-50 text-black hover:text-green-600 transition duration-500 ease-in-out hover:opacity-100"></a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full border-collapse  bg-gray-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Age</th>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>

                        </thead>
                        <tbody is="transition-group" name="fade">
                            <tr v-for="(person, index) in filterItems" :key="person.id">
                                <td>{{person.name}}</td>
                                <td>{{person.lastname}}</td>
                                <td>{{person.age}}</td>
                                <td>{{person.dni}}</td>
                                <td>{{person.email}}</td>
                                <td><a title="Edit" :href="'/people/'+ person.id +'/edit'"
                                        class="hover:text-blue-600 action fas fa-edit"></a>
                                    | <i title="Delete" @click="deletePerson(person.id, index)"
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
        name: 'CarsPeople',
        data: function () {
            return {
                list: this.people,
                search: '', 
            }
        },
        computed: {
            filterItems: function () {
                return this.filters()
            },
        },
        props: {
            people: {
                type: Array,
                default: []
            },
        },
        methods: {
            deletePerson: function (id, index) {
                this.$swal({
                    title: "Are you sure that you want delete item",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#f44336",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value == true) {
                        axios.delete("/people/" + id)
                            .then(() => {
                                this.list.splice(index, 1)
                                this.$swal({
                                    title: "Item deleted",
                                    icon: 'success',
                                    toast: true,
                                    showConfirmButton: false,
                                    position: 'top-end',
                                    timerProgressBar: true,
                                    timer: 5000
                                })
                            }).catch((e) => {
                                console.log(e);
                            });
                    }
                })
            },
            filters() {
                return this.list.filter(item => item.name.match(this.search.trim()) || item.lastname.match(this.search.trim()) || item.age == this.search.trim() || item.DNI == this.search.trim() || item.email.match(this.search.trim()));
            },
        }
    };

</script>
