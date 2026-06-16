<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the Expenses.
     */
    public function index(Request $request)
    {
        //getting all the espense for the user
        $expenses = $request->user()->expenses()->latest()->get();

        return response()->json($expenses);
    }

    /**
     * Show the form for creating a new expenditure.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created expense in storage.
     */
    public function store(Request $request)
    {
        //validation
        $validated = $request->validate([
           'title' => 'required',
           'amount' => 'required|numeric|min:0',
           'category' => 'required',
           'date' => 'required|date',
        ]);
         $expense = $request->user()->expenses()->create($validated);
         return response()->json($expense);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified expense in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
        if($expense->user_id !== $request->user()->id){
            return response()->json(['message' => 'Unauthorised']);
        }

        $validated = $request->validate([
            'title' => 'sometimes',
           'amount' => 'sometimes|numeric',
           'category' => 'sometimes|max:200',
           'date' => 'sometimes|date',
        ]);

        $expense->update($validated);
        return response()->json($expense);
    }

    /**
     * Remove the specified expense from storage.
     */
    public function destroy(Expense $expense ,Request $request )
    {
        //
        if($expense->user_id !== $request->user()->id){
           return response()->json(['message'=> 'Unauthorised']);
        }

        $expense->delete();
        return response()->json(['message'=> 'Expense has been deleted']);
    }
}
