export default   {

    get(uri) {
        return Sg.fetch('get', uri);
    },

    find(uri) {
        return Sg.fetch('find', uri);
    },

    fetch(method, uri) {
        return new Promise((resolve, reject) => {
            axios
                .get(uri)
                .then(response => {

                    if (method === 'find') {
                        resolve(response.data);
                        return;
                    }

                    let items = [];
                    if ('data' in response.data) {
                        for (let index in response.data.data) {
                            response.data.data[index].destroyForm = new Form({});
                        }
                        resolve(response.data);
                    } else {
                        for (let index in response.data) {
                            if (isNaN(index)) continue;
                            let item = response.data[index];
                            item.editForm = new Form({});
                            item.destroyForm = new Form({});
                            items.push(item);
                        }
                        resolve(items);
                    }
                })
                .catch(errors => {
                    Sg.handleErrors(errors);
                    reject(errors.data);
                });
        });
    },


    upload(uri, files) {
        const data = new FormData();
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            data.append(`file[${i}]`, file);
        }

        const config = {
            headers: {'content-type': 'multipart/outros-data'}
        };

        return axios.post(uri, data, config);
    },

    post(uri, form) {
        return Sg.sendForm('post', uri, form);
    },

    put(uri, form) {
        return Sg.sendForm('put', uri, form);
    },

    patch(uri, form) {
        return Sg.sendForm('patch', uri, form);
    },

    delete(uri, form) {
        form.hasSwal = true;
        return new Promise((resolve, reject) => {
            swal({
                title: "Você tem Certeza?",
                text: "Esta operacão não pode ser desfeita.",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Sim, tenho!",
                showLoaderOnConfirm: true,
                closeOnConfirm: false
            }, () => {
                Sg.sendForm('delete', uri, form)
                    .then(data => {
                        resolve(data);
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        });
    },

    sendForm(method, uri, form) {
        return new Promise((resolve, reject) => {
            form.startProcessing();
            axios[method](uri, JSON.parse(JSON.stringify(form)))
                .then(response => {
                    let data = response.data;
                    if (form.hasSwal) {
                        swal('Success!', data.message, "success");
                        resolve(data);
                        return;
                    }

                    if (_.has(data, 'data')) {
                        data.data.editForm = new Form({});
                        data.data.destroyForm = new Form({});
                    }
                    resolve(data);
                })
                .catch(errors => {
                    console.log("Ajax Error", errors);
                    Sg.handleErrors(form, errors);
                    if (_.has(errors.response, 'data')) {
                        form.errors.set(errors.response.data.errors);
                    }
                    form.busy = false;
                    reject(errors.data);
                });
        });
    },
    // --
    handleErrors(form, errors) {
        if (_.has(errors.response, 'status')) {
            if (errors.response.status === 401) {
                window.location = '/';
            }

            if (form.Swal) {
                swal("Error occurred!", errors.response.data.message, "error");
                return;
            } else {
                Bus.$emit(
                    'notify',
                    'error',
                    errors.response.data.message
                );
            }
        }
    }
};
