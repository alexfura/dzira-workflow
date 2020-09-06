<template>
    <v-container class="fill-height" fluid>
        <v-row justify="center" align="center">
            <v-col class="col-12" sm="8" md="6">
                <v-card class="elevation-10">
                    <v-window v-model="step">
                        <!-- Login -->
                        <v-window-item :value="1">
                            <v-row>
                                <LoginForm></LoginForm>
                                <v-col class="col-4 vcenter blue">
                                    <v-card-text class="white--text">
                                        <h1 class="text-center headline">New to Dzira?</h1>
                                        <h5 class="text-center overline">
                                            Please Sign Up to continue
                                        </h5>
                                    </v-card-text>
                                    <div class="text-center mb-10">
                                        <v-btn dark outlined @click="step = 2">Sign Up</v-btn>
                                    </div>
                                    <v-card-text class="white--text">
                                        <h1 class="text-center headline">Forgot your password?</h1>
                                        <h5 class="text-center overline">
                                            Reset password
                                        </h5>
                                    </v-card-text>
                                    <div class="text-center mb-6">
                                        <v-btn dark outlined @click="step = 3">Reset password</v-btn>
                                    </div>
                                </v-col>
                            </v-row>
                        </v-window-item>
                        <!-- Sign up -->
                        <v-window-item :value="2">
                            <v-row>
                                <v-col class="col-4 vcenter blue">
                                    <v-card-text class="white--text">
                                        <h1 class="text-center headline">Already have an account?</h1>
                                        <h5 class="text-center overline">Please sign in</h5>
                                    </v-card-text>
                                    <div class="text-center mb-10">
                                        <v-btn dark outlined @click="step = 1">Login</v-btn>
                                    </div>
                                </v-col>
                                <SignUpForm></SignUpForm>
                            </v-row>
                        </v-window-item>
                        <v-window-item :value="3">
                            <v-row>
                                <v-col class="col-4 vcenter blue">
                                    <v-card-text class="white--text">
                                        <h1 class="text-center headline">Back to login</h1>
                                    </v-card-text>
                                    <div class="text-center md-10">
                                        <v-btn dark outlined @click="step = 1">Login</v-btn>
                                    </div>
                                </v-col>
                                <ResetPasswordForm></ResetPasswordForm>
                            </v-row>
                        </v-window-item>
                    </v-window>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import LoginForm from "./LoginForm";
    import SignUpForm from "./SignUpForm";
    import ResetPasswordForm from "./ResetPasswordForm";
    export default {
        name: "UserEntry",
        components: {ResetPasswordForm, SignUpForm, LoginForm},
        data: () => ({
            step: 1
        }),
    }
</script>

<style scoped>

</style>