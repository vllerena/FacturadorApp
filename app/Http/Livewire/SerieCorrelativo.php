<?php

namespace App\Http\Livewire;

use App\Models\Comprobante;
use App\Models\TipoComprobante;
use App\TableInfo\ComprobanteTableInfo;
use App\TableInfo\TipoComprobanteTableInfo;
use Livewire\Component;

class SerieCorrelativo extends Component
{
    public $tipocomprobante;
    public $serie;
    public $correlativo;

    public $selectedTipoComprobante = NULL;
    public $selectedSerie = NULL;

    public function mount()
    {
        $this->tipocomprobante = TipoComprobante::all();
        $this->serie = collect();
        $this->correlativo;
    }

    public function render()
    {
        return view('livewire.serie-correlativo');
    }

    public function updatedSelectedTipoComprobante($comprobante)
    {
        $this->serie = Comprobante::where(ComprobanteTableInfo::TIPO_COMPROBANTE, $comprobante)->get();
        $this->selectedSerie = NULL;
    }

    public function updatedSelectedSerie($serie)
    {
        $this->correlativo = Comprobante::where(ComprobanteTableInfo::ID, $serie)->first();
    }
}
