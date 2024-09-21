<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ConstG;
use App\Models\RecibosG;
use Livewire\WithPagination;
use PDF;  //download

class DocsGenerados extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $list=1, $anio, $tipo,  $ExpConsul, $clik_button;

    public function updatingSearch() //para cuando halla un filtrado (buscar)
    {
        $this->resetPage();
    }
    
    public function render()
    {
        if ($this->list== 2){
            $recibs = RecibosG::paginate(10);
            if ($this->anio){
                $recibs = RecibosG::whereYear('fechaEmi', $this->anio)->orderBy('id','desc')->paginate(10);
            }
            return view('livewire.docs-generados',['recibs'=>$recibs]);
        }else{
            $conts = ConstG::paginate(10);
            if ($this->anio){
                $conts = ConstG::whereYear('fechaEmi', $this->anio)->orderBy('id','desc')->paginate(10);
            }
            if ($this->tipo){
                $conts = ConstG::whereYear('fechaEmi', $this->anio)->where('typeConst','=',$this->tipo)->orderBy('id','desc')->paginate(10);
            }
            return view('livewire.docs-generados',['conts'=>$conts]);
        }
    }

   
    public function ExporConsul(){
        $list = $this->list;
        $clik_button = 1;
        $this->clik_button= $clik_button;
        if ($this->list== 2){
            $ExpConsul = RecibosG::get();
            if ($this->anio){
                $ExpConsul = RecibosG::whereYear('fechaEmi', $this->anio)->get();
            }
        }else{
            $ExpConsul = ConstG::get();
            if ($this->anio){
                $ExpConsul = ConstG::whereYear('fechaEmi', $this->anio)->get();
            }
            if ($this->tipo){
                $ExpConsul = ConstG::whereYear('fechaEmi', $this->anio)->where('typeConst','=',$this->tipo)->get();
            }
        }
        $view = view('Administrar/DocsGenerados/docs-pdf')->with(compact('ExpConsul','list'));
        $html = $view->render();
        $pdf = PDF::loadHTML($html)->save(public_path() . '/Constancias-Recibos.pdf');

        return back();

    }

}
