<template>
    <v-app>
        <v-main>
            <v-container class="mt-15">
                <v-row justify="center">
                    <ul v-for="(list, index) in propertyList" :key="index">
                        <li>
                            <v-btn
                                class="mb-5 mr-10"
                                width="100%"
                                height="100px"
                                @click="getProperty(list)"
                                >{{ list.id }}</v-btn
                            >
                        </li>
                        <li>家賃：{{ list.rent + "円" }}</li>
                        <li>
                            広さ：{{ list.size + "cm"
                            }}<span class="small_unit">2</span>
                        </li>
                        <li>築年数：{{ list.age }}</li>
                        <li>階：{{ list.floor }}</li>
                        <p></p>
                    </ul>
                </v-row>
                <v-row justify="center">
                    <v-col style="text-align: center">
                        <v-btn
                            color="blue-grey lighten-3"
                            width="80%"
                            height="50px"
                            @click="registerPropaty"
                            >登録</v-btn
                        >
                    </v-col>
                    <v-col style="text-align: center">
                        <v-btn
                            color="blue-grey lighten-3"
                            width="80%"
                            height="50px"
                            @click="updatePropaty(1)"
                            >更新</v-btn
                        >
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
                .get(url)
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
            var url = "/api/" + "properties/" + value;

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
    margin: 5px 0;
}
.small_unit {
    font-size: 2px;
    vertical-align: top;
}
</style>
