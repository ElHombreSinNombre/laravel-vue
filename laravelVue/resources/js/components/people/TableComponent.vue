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
                                People</h3>
                        </div>
                        <a href="/people/create"
                            class="text-right cursor-pointer fas fa-plus-circle opacity-50 text-black hover:text-green-600 transition duration-500 ease-in-out hover:opacity-100"></a>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full border-collapse  bg-gray-100">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase  whitespace-nowrap font-semibold text-left ">
                                    Name</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase whitespace-nowrap font-semibold text-left ">
                                    Lastname</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase  whitespace-nowrap font-semibold text-left ">
                                    Age</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase  whitespace-nowrap font-semibold text-left ">
                                    DNI</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase  whitespace-nowrap font-semibold text-left ">
                                    Email</th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase  whitespace-nowrap font-semibold text-left ">
                                    Action</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr v-for="person in people" :key="person.id">
                                <td class="px-6 py-3 align-middle">{{person.name}}</td>
                                <td class="px-6 py-3 align-middle">{{person.lastname}}</td>
                                <td class="px-6 py-3 align-middle">{{person.age}}</td>
                                <td class="px-6 py-3 align-middle">{{person.dni}}</td>
                                <td class="px-6 py-3 align-middle">{{person.email}}</td>
                                <td class="px-6 py-3 align-middle"><i
                                        class="cursor-pointer hover:text-blue-600 transition duration-500 ease-in-out fas fa-edit"></i>
                                    | <i
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
        props: ['people'],
        methods: {
            delete: function (id) {
                axios
                    .delete("/people/" + id)
                    .then((response) => {
                        console.log(response);
                    });
            },
        }
    };

</script>
