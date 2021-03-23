<?php

namespace App\Http\Livewire;

use App\TableInfo\ProductoTableInfo;
use Livewire\Component;
use App\Models\Producto;

class SelectProducto extends Component
{
    public $productos;
    public $producto;
    public $precio = 0;
    public $cantidad = 1;
    public $subtotal = 0;
    public $selectedProducto = NULL;

    protected $rules = [
        'cantidad' => 'required',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function updatedSelectedProducto($producto)
    {
        $this->producto = Producto::where(ProductoTableInfo::ID, $producto)->first();
        $this->precio = $this->producto->precio;
    }

    public function mount()
    {
        $this->productos = Producto::all();
        $this->producto;
        $this->precio;
        $this->cantidad;
        $this->subtotal;
    }

    public function render()
    {
//        $this->subtotal = calcSubtotal();
        return view('livewire.select-producto');
    }
}
