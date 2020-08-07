<template>
    <v-list-item class="list-item">
        <v-card class="mx-auto" max-width="344">
            <v-card-text>
                <p class="display-1 text--primary">
                    ISSUE #323
                </p>
                <p>adjective</p>
                <div class="text--primary">
                    well meaning and kindly.<br>
                    "a benevolent smile"
                </div>
            </v-card-text>
            <v-card-actions>
                <v-btn
                        text
                        color="deep-purple accent-4"
                >
                    Learn More
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-list-item>
</template>

<script>
    export default {
        name: "Task"
    }
</script>

<style scoped>
    .list-item {
        padding: 10px;
    }
</style>