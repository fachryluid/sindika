<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Stock;

class StockController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $stocks = collect([
      (object) [
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
        'quantity' => 10,
        'medicine' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
          'name' => 'Paracetamol',
        ],
        'supplier' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
          'name' => 'PT. Kimia Farma'
        ]
      ],

      (object) [
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
        'quantity' => 20,
        'medicine' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
          'name' => 'Amoxilin',
        ],
        'supplier' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
          'name' => 'PT. Kimia Farma'
        ]
      ],

      (object) [
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
        'quantity' => 30,
        'medicine' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
          'name' => 'Antimo',
        ],
        'supplier' => (object) [
          'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
          'name' => 'PT. Kimia Farma'
        ]
      ],
    ]);

    return view('dashboard.master.stock.index', compact('stocks'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $suppliers = collect([
      (object) [
        'id' => 1,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
        'name' => 'PT. Kimia Farma'
      ],

      (object) [
        'id' => 2,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
        'name' => 'One Setia'
      ],

      (object) [
        'id' => 3,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
        'name' => 'Cahaya Sejati'
      ],
    ]);

    $medicines = collect([
      (object) [
        'id' => 1,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
        'name' => 'Paracetamol',
      ],

      (object) [
        'id' => 2,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
        'name' => 'Amoxilin',
      ],

      (object) [
        'id' => 3,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
        'name' => 'Antimo',
      ],
    ]);

    return view('dashboard.master.stock.create', compact('suppliers', 'medicines'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreStockRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Stock $stock)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Stock $stock)
  {
    $suppliers = collect([
      (object) [
        'id' => 1,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
        'name' => 'PT. Kimia Farma'
      ],

      (object) [
        'id' => 2,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
        'name' => 'One Setia'
      ],

      (object) [
        'id' => 3,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
        'name' => 'Cahaya Sejati'
      ],
    ]);

    $medicines = collect([
      (object) [
        'id' => 1,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
        'name' => 'Paracetamol',
      ],

      (object) [
        'id' => 2,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cb',
        'name' => 'Amoxilin',
      ],

      (object) [
        'id' => 3,
        'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72cc',
        'name' => 'Antimo',
      ],
    ]);

    $stock = (object) [
      'uuid' => '128c4c7f-2199-4e20-819b-8074cbfc72ca',
      'quantity' => 10,
      'medicine' => $medicines[0],
      'supplier' => $suppliers[0],
      'order_cost' => 10000,
      'storage_cost' => 1000,
      'order_date' => '2021-01-01',
      'expected_delivery' => '2021-01-01',
      'price' => 10000,
    ];
    return view('dashboard.master.stock.edit', compact('stock', 'suppliers', 'medicines'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateStockRequest $request, Stock $stock)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Stock $stock)
  {
    //
  }
}
