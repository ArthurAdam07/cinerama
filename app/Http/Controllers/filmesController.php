<?php
namespace App\Http\Controllers;
use App\filmes;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class filmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checa se o usuário está cadastrado
        if( Auth::check() ){   
            //retorna somente as filmes cadastradas pelo usuário cadastrado
            $listarfilmes = filmes::where('user_id', Auth::id() )->get();     
        }else{
            //retorna todas as filmes
            $listarfilmes = filmes::all();
        }
                
        $listarfilmes = filmes::paginate(10);
        return view('filmes.list',['filmes' => $listarfilmes]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filmes.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a filmes',
            'synopsis.required' => 'É obrigatória uma descrição para a filmes',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da filmes',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'scheduledto' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('filmes/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_filmes = new filmes();
        $obj_filmes->title =       $request['title'];
        $obj_filmes->synopsis = $request['synopsis'];
        $obj_filmes->note = $request['note'];
        $obj_filmes->datasheet = $request['datasheet'];
        $obj_filmes->scheduledto = $request['scheduledto'];
        $obj_filmes->save();
        return redirect('/filmes')->with('success', 'Filme criado com sucesso!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filmes = filmes::find($id);
        return view('filmes.show',['filmes' => $filmes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busco os dados do obj filmes que o usuário deseja editar
        $obj_filmes = filmes::find($id);
        
        //verifico se o usuário logado é o dono da filmes
        if( Auth::id() == $obj_filmes->user_id ){
            //retorno a tela para edição
            return view('filmes.edit',['filmes' => $obj_filmes]);    
        }else{
            //retorno para a rota /filmes com o erro
            return redirect('/filmes')->withErrors("Você não tem permissão para editar este item");
        }
           
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a filmes',
            'synopsis.required' => 'É obrigatória uma descrição para a filmes',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da filmes',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'synopsis' => 'required',
            'scheduledto' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('filmes/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        $obj_filmes = new filmes();
        $obj_filmes->title =       $request['title'];
        $obj_filmes->synopsis = $request['synopsis'];
        $obj_filmes->note = $request['note'];
        $obj_filmes->datasheet = $request['datasheet'];
        $obj_filmes->scheduledto = $request['scheduledto'];
        $obj_filmes->id     = Auth::id();
        $obj_filmes->save();
        return redirect('/filmes')->with('success', 'Filme criado com sucesso!!');
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_filmes = filmes::find($id);
        
        //verifico se o usuário logado é o dono da Filme
        if( Auth::id() == $obj_filmes->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('filmes.delete',['filmes' => $obj_filmes]);    
        }else{
            //retorno para a rota /filmes com o erro
            return redirect('/filmes')->withErrors("Você não tem permissão para deletar esta Filme");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\filmes  $filmes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_filmes = filmes::findOrFail($id);
        $obj_filmes->delete($id);
        return redirect('/filmes')->with('sucess','Filme excluída com Sucesso!!');
    }
}