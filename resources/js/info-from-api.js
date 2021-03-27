const { default: axios } = require("axios");

function cases() {
    return {
        cases: [],
        fetchCases: function () {
            this.error = this.cases = null;
            axios
                .get("/api/cases")
                .then((response) => {
                    console.log(response.data.data);

                    // this.books = response.data.data;
                })
                .catch((error) => {
                    this.error = error.response.data.message || error.message;
                });
        },
    };
}
