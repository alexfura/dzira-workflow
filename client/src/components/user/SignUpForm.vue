<template>
    <v-col class="col-8">
        <v-card-text class="pa-10">
            <h1 class="text-center display-1">
                Sign Up
            </h1>
            <v-form>
                <v-text-field
                        id="first_name"
                        label="First Name"
                        name="first_name"
                        type="text"
                >
                </v-text-field>
                <v-text-field
                        id="second_name"
                        label="Second Name"
                        name="second_name"
                        type="text"
                >
                </v-text-field>
                <v-text-field
                        id="email"
                        label="Email"
                        name="email"
                        type="email"
                        append-icon="mdi-email"
                >
                </v-text-field>
                <v-text-field
                        id="password"
                        label="Password"
                        name="password"
                        type="password"
                >
                </v-text-field>
                <div class="text-center mt-2">
                    <v-btn large>Sign up</v-btn>
                </div>
            </v-form>
        </v-card-text>
    </v-col>
</template>

<script>
    export default {
        name: "SignUpForm"
    }
</script>

<style scoped>

</style>