module.exports = {

    get(uri) {
        return new Promise((resolve, reject) => {
            axios
                .get(uri)
                .then(response => {

                    let data = response.data;
                    resolve(data);
                })
                .catch(errors => {
                    Sgs.errors = errors.data;
                    reject(errors.data);
                });
        });
    },

    post(uri, form) {
        return Sgs.submitForm('post', uri, form);
    },

    put(uri, form) {
        return Sgs.submitForm('put', uri, form);
    },


    submitForm(method, url, form){
        return new Promise((resolve, reject) => {
            axios[method](url, form)
                .then(response =>{
                let data = response.data;
                resolve(data);
                })

                .catch(errors => {
                    console.log("Ajax Error", errors);
                    reject(errors.data);
                });
        });
    }
};