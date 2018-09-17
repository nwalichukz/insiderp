<template>
    <div>
        <a href="#" @click="show" class="mr-1 text-blue">Login</a>
        <modal name="login"
               :width="450"
               :height="300">
            <div class="py-8 px-8">
                <div class="font-hairline text-2xl mb-6">Login</div>
                <div class="mb-3">
                    <form enctype="multipart/form-data" @submit.prevent="login">
                        <div class="mb-4">
                            <label class="block font-base tracking-wide text-black mb-1">Email Address</label>
                            <input type="email" name="email" placeholder="Email Address" class="appearance-none font-normal border border-solid w-68 py-2 px-3 rounded focus:border-grey" v-model="fields.email">
                            <div v-if="errors && errors.email" class="text-xs text-red-dark font-sans mt-1">{{ errors.email }}</div>
                        </div>

                        <div class="mb-4">
                            <label class="block font-base tracking-wide text-black mb-1">Password</label>
                            <input type="password" name="password" placeholder="Password" class="appearance-none font-normal border border-solid w-68 py-2 px-3 rounded focus:border-grey" v-model="fields.password">
                            <div v-if="errors && errors.password" class="text-red-dark">{{ errors.password }}</div>
                        </div>
                        <div class="">
                            <button type="submit" class="appearance-none border py-2 px-6 rounded shadow bg-white text-black hover:bg-blue hover:text-white tracking-wide">Login</button>
                        </div>
                    </form>
                </div>
            </div>


        </modal>
    </div>
</template>
<script>
    export default {
        name: 'Login',
        data () {
            return {
                fields: {},
                errors: {},
            }
        },
        methods: {
            show()
            {
                this.$modal.show('login');
            },

            login()
            {
                axios.post('/post-login-any', this.fields).then(response => {
                    if (response.status === 200) location.reload();

                    else
                    {
                        this.errors = {email: "invalid email or password"};
                    }
                });
            },
        }
    }
</script>