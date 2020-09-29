<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetorController extends Controller
{
    protected $model = 'App\Models\Setor';

    protected $data = [
        'title' => 'Setores',
        'url' => 'setores', // caminho da rota do resource
        'showId' => true,
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    use ResourceTrait;
}
