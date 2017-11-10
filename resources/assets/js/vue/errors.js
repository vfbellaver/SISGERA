class Errors {

    /**
     * Cria uma instância da classe de erros.
     */
    constructor() {
        this.errors = {};
    }


    /**
     * Determina se existe um erro no campo.
     *
     * @param {field}
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }


    /**
     * Verifica se existe erros.
     *
     * @returns {boolean}
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }


    /**
     * Retorna a mensagem de erro do campo.
     * @param field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    /**
     * Guarda novos erros.
     * @param errors
     */
    record(errors) {
        this.errors = errors;
    }


    /**
     * Limpa um ou todos os erros.
     * @param field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }
}