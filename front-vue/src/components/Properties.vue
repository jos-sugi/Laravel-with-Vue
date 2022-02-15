<template>
    <v-app>
        <v-main>
            <v-container class="mt-15">
                <v-row justify="center">
                    <ul v-for="(list, index) in propertyList" :key="index">
                        <li>
                            <v-btn @click="getProperty(list)">{{
                                list.id
                            }}</v-btn>
                        </li>
                    </ul>
                </v-row>
                <v-row justify="center">
                    <v-col style="text-align: center">
                        <v-btn @click="registerPropaty">登録</v-btn>
                    </v-col>
                    <v-col style="text-align: center">
                        <v-btn @click="updatePropaty(1)">更新</v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
import axios from "axios";
export default {
    name: "App",
    data() {
        return {
            propertyList: [],
            //物件情報
            prorerty_id: "",
            size: 33,
            rent: 70000,
            age: 3,
            floor: 5,
        };
    },
    created() {
        this.getProperties();
    },
    methods: {
        /**
         * 物件一覧
         */
        getProperties() {
            var url = "/api/" + "properties";

            axios
                .get(url)
                .then((response) => {
                    console.log(response);
                    this.propertyList = response.data;
                })
                .catch();
        },
        /**
         * 物件詳細
         */
        getProperty(value) {
            var url = "/api/" + "properties/" + value.id;

            axios
                .post(url)
                .then((response) => {
                    console.log(response);
                })
                .catch();
        },
        /**
         * 物件登録
         */
        registerPropaty() {
            var url = "/api/" + "properties";

            axios
                .post(url, {
                    data: {
                        size: this.size,
                        rent: this.rent,
                        age: this.age,
                        floor: this.floor,
                    },
                })
                .then((response) => {
                    console.log(response);
                })
                .catch();
        },
        /**
         * 物件更新
         */
        updatePropaty(value) {
            var url = "/api/" + "properties/update/" + value;

            axios
                .post(url, {
                    data: {
                        prorerty_id: this.property_id,
                        size: this.size,
                        rent: this.rent,
                        age: this.age,
                        floor: this.floor,
                    },
                })
                .then((response) => {
                    console.log(response);
                })
                .catch();
        },
    },
};
</script>

<style scoped>
ul {
    list-style: none;
}
</style>
