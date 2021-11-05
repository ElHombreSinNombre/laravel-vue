<template>
    <div class="center">
        <div
            class="w-1/2 bg-white rounded p-8 m-6 shadow-md rounded hover:shadow-2xl transition duration-500 ease-in-out">
            <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">
                {{this.person!=null ?  'Update '+ this.person.model : 'Create'}}</h1>
            <div v-if="errors" class="bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                <div v-for="(v, k) in errors" :key="k">
                    <p v-for="error in v" :key="error" class="text-sm">
                        {{ error }}
                    </p>
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="name">Name</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="name" v-model="name" maxlength="12"
                    placeholder="Name...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="last_name">Last Name</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="lastname" v-model="lastname"
                    maxlength="12" placeholder="Lastname...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="age">Age</label>
                <input class="border py-2 px-3 text-grey-800" type="number" min="18" max="99" name="age" v-model="age"
                    placeholder="Age...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="dni">DNI</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="dni" v-model="dni" maxlength="7"
                    placeholder="DNI...">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="email">Email</label>
                <input class="border py-2 px-3 text-grey-800" type="email" name="email" v-model="email" maxlength="12"
                    placeholder="Email...">
            </div>
            <button @click="this.person!=null ? update(this.person.id) : create()"
                class="w-full bg-blue-400 hover:bg-blue-600 transition duration-500 ease-in-out text-white p-3 rounded"
                type="submit">{{this.person!=null ? 'Update' : 'Create'}}</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PeopleForm',
        data: function () {
            return {
                name: this.person != null ? this.person.name : '',
                lastname: this.person != null ? this.person.lastname : '',
                age: this.person != null ? this.person.age : '',
                dni: this.person != null ? this.person.dni : '',
                email: this.person != null ? this.person.email : '',
                errors: null
            }
        },
        props: {
            person: {
                type: [],
                default: ''
            },
        },
        methods: {
            store: function () {
                axios.post("/cars/", {
                        name: this.name,
                        lastname: this.lastname,
                        age: this.age,
                        dni: this.dni,
                        email: this.email
                    })
                    .then(() => {
                        this.$swal({
                            title: "People created",
                            icon: 'success',
                            toast: true,
                            showConfirmButton: false,
                            position: 'top-end',
                            timerProgressBar: true,
                            timer: 5000
                        })
                        this.name = '',
                        this.lastname = '',
                        this.age = '',
                        this.dni = ''
                        this.email = ''
                    }).catch((error) => {
                        this.errors = error.data.errors;
                    });
            },
            update: function (id) {
                axios.patch("/cars/" + id, {
                        name: this.name,
                        lastname: this.lastname,
                        age: this.age,
                        dni: this.dni,
                        email: this.email
                    })
                    .then(() => {
                        axios.get('/people')

                    }).catch((error) => {
                        this.errors = error.data.errors;
                    });
            }
        }
    }

</script>
