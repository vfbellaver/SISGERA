<template>
    <div>
        <row>
            <column size="12">
                <label class="control-label">
                    <h4><strong>Nome do Requerente:</strong> &nbsp {{user.name}}</h4>
                </label>
            </column>
        </row>

        <row>
            <column size="4">
                <label class="control-label">
                    <h4><strong>Email:</strong> &nbsp {{user.email}}</h4>
                </label>
            </column>
            <column size="4">
                <label class="control-label">
                    <h4><strong>Rg:</strong> &nbsp {{user.rg}} &nbsp {{user.org_emissor}}</h4>
                </label>
            </column>
            <column size="4">
                <label class="control-label">
                    <h4><strong>Cpf:</strong> &nbsp {{user.cpf}}</h4>
                </label>
            </column>
        </row>

        <row>
            <column size="4">
                <label class="control-label">
                    <h4><strong>Tel Fixo:</strong>&nbsp {{user.telefone}} </h4>
                </label>
            </column>
            <column size="4">
                <label class="control-label">
                    <h4><strong>Tel Celular:</strong>&nbsp {{user.celular}}</h4>
                </label>
            </column>
        </row>
    </div>
</template>
<script>
    export default {
        props: {
            user: {required: true},
        }
    }
</script>