Vue.directive('cpf', {

    bind: function (el, binding) {

        $(el).attr('maxlength', 14);

        let mask = function () {
            let v = $(el).val();
            v = v.toString().replace(/^\D/g,"");

            if (v === undefined || v === null || v.length === 0) {
                return "";
            }
            v=v.replace(/\D/g,"");                    //Remove tudo o que não é dígito
            v=v.replace(/(\d{3})(\d)/,"$1.$2");       //Coloca um ponto entre o terceiro e o quarto dígitos
            v=v.replace(/(\d{3})(\d)/,"$1.$2");       //Coloca um ponto entre o terceiro e o quarto dígitos
                                                     //de novo (para o segundo bloco de números)
            v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2"); //Coloca um hífen entre o terceiro e o quarto dígitos
            console.log(v);



            $(el).val(v);

            let event = new Event('input', {bubbles: true});
            el.value = v;
            el.dispatchEvent(event);
        };

        $(el).change(() => {
            setTimeout(mask, 1);
        });
        $(el).keydown(() => {
            $(el).trigger('change');
        });
    },

});