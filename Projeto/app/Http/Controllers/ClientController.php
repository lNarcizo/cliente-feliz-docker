<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Client;
use Yajra\Datatables\Datatables;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {

        return view('client.index');
    }

    public function store(ClientRequest $request)
    {

        try{

            $client = new Client();

            $client->nome     = $request->nome;
            $client->cpfCnpj  = $request->cpfCnpj;
            $client->cep      = $request->cep;
            $client->cidade   = $request->cidade;
            $client->endereco = $request->endereco;

            $client->save();
            
            $json = json_encode([
                'error' => false,
                'message' => 'Cliente criado'
            ]);

        } catch(Exception $ex) {

            $json = json_encode([
                'error' => true,
                'message' => $ex->getMessage()
            ]);

        }

        echo $json;
        return;

    }

    public function destroy($id)
    {
        try{
            Client::FindOrFail($id)->delete();

            $json = json_encode([
                'error' => false,
                'message' => 'Cliente excluido'
            ]);

        } catch(Exception $ex) {

            $json = json_encode([
                'error' => true,
                'message' => $ex->getMessage()
            ]);
        }

        echo $json;
        return;
    }

    public function edit($id)
    {

        try{

            $client = Client::FindOrFail($id);

            $json = json_encode([
                'error' => false,
                'dados' => $client
            ]);

        } catch(Exception $ex) {

            $json = json_encode([
                'error' => true,
                'message' => $ex->getMessage()
            ]);
        }
        

        echo $json;
        return;

    }

    public function update(ClientRequest $request)
    {
        try{
            Client::FindOrFail($request->id)->update($request->all());

            $json = json_encode([
                'error' => false,
                'message' => 'Cliente editado'
            ]);

        } catch(Exception $ex) {

            $json = json_encode([
                'error' => true,
                'message' => $ex->getMessage()
            ]);
        }

        echo $json;
        return;
    }

    public function table(Request $request)
    {
        if($request->ajax()) {
            $clients = Client::all();

            $dataTables = DataTables::of($clients)
                            ->addColumn('action', function($data) {
                                $buttons = "
                                    <div>
                                        <button class='btn btn-primary btn-edit' style='padding: 3px;display: inline;' value='$data->id'  data-bs-toggle='modal' data-bs-target='#editClientModal'><img style='width: 25px;' src='/img/create-outline.svg'></button>
                                        <form class='formDelete' style='display: inline;'>
                                            <input type='hidden' value='$data->id' name='idDelete'/>
                                            <button type='submit' class='btn btn-danger btn-delete' style='padding: 3px;'><img style='width: 25px;' src='/img/trash-outline.svg'></button>
                                        </form>
                                    </div>
                                ";

                                return $buttons;
                            })
                            ->rawColumns(['action'])
                            ->make(true);
        }

        return $dataTables;
    }

}
