@extends('layouts.app')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/packages/dataTables/dataTables.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/packages/messageBox/messageBox.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/packages/dataTables/dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/packages/dataTables/dataTablesMakePdf.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/packages/dataTables/dataTablesHtml.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/packages/dataTables/dataTablesVsFonts.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/packages/messageBox/messageBox.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/packages/mask/mask.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/client-index.js')}}"></script>
@endSection


@section('content')


    <div class="container">
        <table id="client-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome/Razão Social</th>
                    <th>CNPJ/CPF</th>
                    <th>CEP</th>
                    <th>Cidade</th>
                    <th>Endereço</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="text-center">
            <button id="open" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newClientModal">Novo Cliente</button>
        </div>

    </div>

    <div class="modal fade" id="newClientModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="ModalLabel">Novo Cliente</h1>
              <button type="button" id="closeX" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form">
                @csrf
                <div class="modal-body">
                    
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nome/Razão Social</label>
                            <input class="form-control" type="text" id="name" name="nome"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cpfCnpj">CNPJ/CPF</label>
                            <input class="form-control" type="text" id="cpfCnpj" name="cpfCnpj"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cep">CEP</label>
                            <input class="form-control" type="text" id="cep" name="cep"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="city">Cidade</label>
                            <input class="form-control" type="text" id="city" name="cidade"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="end">Endereço</label>
                            <input class="form-control" type="text" id="end" name="endereco"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" id="close" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="save" type="submit" class="btn btn-primary">Salvar Cliente</button>
                </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="ModalLabel">Editar Cliente</h1>
              <button type="button" id="closeXEdit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formEdit">
                @csrf
                <input type="hidden" id="id" name="id"/>
                <div class="modal-body">
                    
                    <div>
                        <div class="mb-3">
                            <label class="form-label" for="name">Nome/Razão Social</label>
                            <input class="form-control" type="text" id="nameEdit" name="nome"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cpfCnpj">CNPJ/CPF</label>
                            <input class="form-control" type="text" id="cpfCnpjEdit" name="cpfCnpj"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cep">CEP</label>
                            <input class="form-control" type="text" id="cepEdit" name="cep"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="city">Cidade</label>
                            <input class="form-control" type="text" id="cityEdit" name="cidade"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="end">Endereço</label>
                            <input class="form-control" type="text" id="endEdit" name="endereco"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" id="closeEdit" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button id="save" type="submit" class="btn btn-primary">Salvar Cliente</button>
                </div>
            </form>
          </div>
        </div>
    </div>

@endSection