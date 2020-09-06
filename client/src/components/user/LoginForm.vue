<template>
    <v-col class="col-8">
        <v-card-text class="pa-10">
            <h1 class="text-center display-1">
                Login
            </h1>
            <v-form>
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
                        append-icon="showPassword ? mdi-eye : mdi-eye-off"
                >
                </v-text-field>
                <div class="text-center md-10">
                    <v-btn large>Sign up</v-btn>
                </div>
            </v-form>
        </v-card-text>
    </v-col>
</template>

<script>
    export default {
        name: "LoginForm",
        data: () => ({
            showPassword: false,
        }),
    }
</script>

<style scoped>

</style>