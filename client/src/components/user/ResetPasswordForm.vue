<template>
    <v-col class="col-8">
        <v-card-text class="pa-10">
            <h1 class="text-center display-1">
                Forgot your password?
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
                <div class="text-center mt-2">
                    <v-btn large>Sign up</v-btn>
                </div>
            </v-form>
        </v-card-text>
    </v-col>
</template>

<script>
    export default {
        name: "ResetPasswordForm"
    }
</script>

<style scoped>

</style>