<template>
    <v-app>
        <v-main>
            <v-container class="mt-15">
                <v-row justify="center">
                    <ul v-for="(list, index) in propertyList" :key="index">
                        <li>
                            <v-btn @click="getProperty(list)">{{ list }}</v-btn>
                        </li>
                    </ul>
                </v-row>
                <v-row justify="center">
                    <v-col style="text-align: center">
                        <v-btn @click="registerPropaty">登録</v-btn>
                    </v-col>
                    <v-col style="text-align: center">
                        <v-btn @click="updatePropaty">更新</v-btn>
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
            name: "aaa",
            commnet: "bbb",
            // baseUrl:
            //     "https://virtserver.swaggerhub.com/jos.sugi03/Property/1.0.0/",
            baseUrl: "http://127.0.0.1:8000/api/",
            propertyList: [],
            //物件情報
            prorerty_id: "",
            size: "",
            rent: "",
            age: "",
            floor: "",
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
            var url = this.baseUrl + "properties";

            axios.get(url).then((response) => {
                this.propertyList = response.data;
                console.log(this.propertyList);
            });
        },
        /**
         * 物件詳細
         */
        getProperty(value) {
            var url = this.baseUrl + "properties/" + value.prorerty_id;

            axios.post(url).then((response) => {
                console.log(response);
            });
        },
        /**
         * 物件登録
         */
        registerPropaty() {
            var url = this.baseUrl + "properties";

            axios
                .post(url, {
                    fields: {
                        size: this.size,
                        rent: this.rent,
                        age: this.rent,
                        floor: this.floor,
                    },
                })
                .then((response) => {
                    console.log(response);
                });
        },
        /**
         * 物件更新
         */
        updatePropaty() {
            var url = this.baseUrl + "properties";

            axios
                .post(url, {
                    fields: {
                        prorerty_id: this.property_id,
                        size: this.size,
                        rent: this.rent,
                        age: this.rent,
                        floor: this.floor,
                    },
                })
                .then((response) => {
                    console.log(response);
                });
        },
    },
};
</script>

<style scoped>
ul {
    list-style: none;
}
</style>
