<template>
    <div class="relative py-16 bg-blueGray-50 h-screen w-screen grid place-items-center">
        <div
            class="w-1/2 bg-white rounded shadow-2xl p-8 m-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">Cars Form</h1>
            <form action="/" method="post">
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="name">Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="name" v-model="name" placeholder="Name">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="last_name">Last Name</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="lastname" v-model="lastname" placeholder="Lastname">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="age">Age</label>
                    <input class="border py-2 px-3 text-grey-800" type="number" min="1" max="100" name="age"
                        v-model="age" placeholder="Age">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="dni">DNI</label>
                    <input class="border py-2 px-3 text-grey-800" type="text" name="dni" v-model="dni" placeholder="DNI">
                </div>
                <div class="flex flex-col mb-4">
                    <label class="mb-2 font-bold text-lg text-gray-900" for="password">Password</label>
                    <input class="border py-2 px-3 text-grey-800" type="password" name="password" v-model="password" placeholder="Password">
                </div>
                <button class="w-full bg-blue-400 hover:bg-blue-600 transition duration-500 ease-in-out text-white p-3 rounded"
                    type="submit">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PeopleForm',
        props: {
            name: {
                type: String,
                default: ''
            },
            lastname: {
                type: String,
                default: ''
            },
            age: {
                type: Number,
                default: ''
            },
            dni: {
                type: String,
                default: ''
            },
            password: {
                type: String,
                default: ''
            }
        },
        store: function () {},
        update: function (id) {}
    }

</script>
