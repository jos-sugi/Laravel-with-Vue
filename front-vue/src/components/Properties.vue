<template>
    <v-app>
        <v-main>
            <v-container class="mt-15">
                <v-row
                    justify="center"
                    v-if="Object.keys(this.selected).length !== 0"
                >
                    <v-card
                        color="blue lighten-5"
                        class="mb-5 mr-10"
                        width="50%"
                        height="500px"
                    ></v-card>
                </v-row>
                <v-row
                    justify="center"
                    v-if="Object.keys(this.selected).length !== 0"
                >
                    <ul>
                        <li>家賃：{{ selected.rent + "円" }}</li>
                        <li>
                            広さ：{{ selected.size + "cm"
                            }}<span class="small_unit">2</span>
                        </li>
                        <li>築年数：{{ selected.age }}</li>
                        <li>階：{{ selected.floor }}</li>
                    </ul>
                </v-row>

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
            //選択物件
            selected: [],
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
                    console.log(response.data);
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
                    this.selected = response.data;
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
                    console.log("新規登録", response.data);
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
                    console.log("更新", response.data);
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
