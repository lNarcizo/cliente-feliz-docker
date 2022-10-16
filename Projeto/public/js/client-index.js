$(function () {

    let table = $('#client-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'pdf', className: 'btn btn-secondary', text: 'Exportar para PDF' }
        ],
        processing: true,
        serverSide: true,
        ajax: {
            url: "/client/table"
        },
        columns: [
            {data: "id", name: "id"},
            {data: "nome", name: "nome"},
            {data: "cpfCnpj", name: "cpfCnpj"},
            {data: "cep", name: "cep"},
            {data: "cidade", name: "cidade"},
            {data: "endereco", name: "endereco"},
            {data: "action", name: "action", orderable: false}
        ],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }

        }
    });

    $("#close,#closeX").on("click", function(){
        $('#name').val('');
        $('#cpfCnpj').val('');
        $('#cep').val('');
        $('#city').val('');
        $('#end').val('');
    });

    $("#closeEdit,#closexEdit").on("click", function(){
        $('#nameEdit').val('');
        $('#cpfCnpjEdit').val('');
        $('#cepEdit').val('');
        $('#cityEdit').val('');
        $('#endEdit').val('');
    });

    $("#cep, #cepEdit").mask("00.000-000");

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('#cpfCnpj, #cpfCnpjEdit').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }
    
    $('#cpfCnpj, #cpfCnpjEdit').length > 11 ? $('#cpfCnpj, #cpfCnpjEdit').mask('00.000.000/0000-00', options) : $('#cpfCnpj, #cpfCnpjEdit').mask('000.000.000-00#', options);

    function getFormData(form){
        const formArray = form.serializeArray();
        const newObj = {};
    
        $.map(formArray, function(arr){
            newObj[arr["name"]] = arr["value"];
        });
    
        return newObj;
    }

    $("#form").on("submit", function (event){

        event.preventDefault();

        let dadosForm = JSON.stringify(getFormData($(this)));
    
        $.ajax({
            type: "post",
            url: "/client/create",
            data: dadosForm,
            dataType: 'json',
            contentType: 'application/json',
            success: function(resp) {
                $("#close").click();

                if(!resp.error){
                    toastr.success(resp.message,'Sucesso!');
                    table.ajax.reload();
                } else {
                    toastr.error(resp.message,'Erro!');
                }
            }
        });

    });

    $("#client-table").on("click", '.btn-edit', function() {

        let id = $(this).val();

        $.ajax({
            type: "get",
            url: `/client/edit/${id}`,
            contentType: 'application/json',
            success: function(resp) {

                resp = JSON.parse(resp);

                if(!resp.error){
                    $('#id').val(resp.dados.id);
                    $('#nameEdit').val(resp.dados.nome);
                    $('#cpfCnpjEdit').val(resp.dados.cpfCnpj);
                    $('#cepEdit').val(resp.dados.cep);
                    $('#cityEdit').val(resp.dados.cidade);
                    $('#endEdit').val(resp.dados.endereco);
                } else {
                    toastr.error(resp.message,'Erro!');
                }
            }
        });
    });

    $("#formEdit").on("submit", function (event){

        event.preventDefault();

        let dadosForm = JSON.stringify(getFormData($(this)));

        let id = $('#id').val();
    
        $.ajax({
            type: "put",
            url: `/client/edit/${id}`,
            data: dadosForm,
            dataType: 'json',
            contentType: 'application/json',
            success: function(resp) {
                $("#closeEdit").click();

                resp = JSON.parse(resp);

                if(!resp.error){
                    toastr.success(resp.message,'Sucesso!');
                    table.ajax.reload();
                } else {
                    toastr.error(resp.message,'Erro!');
                }
            }
        });

    });

    $("#client-table").on("submit", '.formDelete', function (event){

        event.preventDefault();


        let objDados = getFormData($(this));

        let id = objDados.idDelete;

        $.MessageBox({
            buttonDone  : "Sim",
            buttonFail  : "Não",
            title       : "Confirme",
            message     : "Deseja mesmo excluir este cliente?"
        }).done(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "delete",
                url: `/client/delete/${id}`,
                contentType: 'application/json',
                success: function(resp) {
                    resp = JSON.parse(resp);

                    if(!resp.error){
                        toastr.success(resp.message,'Sucesso!');
                        table.ajax.reload();
                    } else {
                        toastr.error(resp.message,'Erro!');
                    }
                }
            });
        });
    });

});