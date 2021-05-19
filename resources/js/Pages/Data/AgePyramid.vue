<template>
    <div>
        <p>{{ statistics }}</p>
        <p>{{ date }}</p>
    </div>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            statistics: [],
            date: "",
        };
    },

    methods: {
        getStatistcs() {
            axios
                .get(this.route("agepyramid"))
                .then((reponse) => {
                    // this.statistics = reponse.data;

                    // this.date = moment("13/10/1997", "DD-MM-YYYY").fromNow(
                    //     true
                    // );
                    this.statistics = _.forEach( reponse.data, (gender) => {
                        _.forEach(gender, (reponse) => {
                            reponse.age = moment(reponse.age, "DD-MM-YYYY").fromNow(
                                true
                            );
                            console.log(reponse);
                        });
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },

    mounted() {
        this.getStatistcs();
    },
};
</script>
