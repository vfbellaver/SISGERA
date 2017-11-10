class SgsForm {

    /**
     * Cria uma nova instancia da classe Form.
     * @param data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {

            this[field] = data[field];

        }

        this.errors =  new Errors();
    }

    /**
     * Obtem os dados para o formulário.
     */
    data(){
        let data = Object.assign({},this);

        delete data.originalData;
        delete data.errors;
    }

    /**
     * Limpa o formulário.
     */
    reset() {
        for(let field in this.originalData){
            this[field] = null;
        }
    }

}