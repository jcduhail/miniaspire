<?php

namespace App\Http\Livewire\Loan;

use App\Models\Loan;
use Livewire\Component;

class CreateLoanForm extends Component
{
    public $amount;

    
    protected $rules = [
        'amount' => 'required|numeric',
    ];
    
    public function render()
    {
        return view('livewire.loan.create-loan-form', [
            'user' => request()->user(),
        ]);
    }
    
    public function submit()
    {
        $this->validate();

        $user = request()->user();
        $data=[
            'user_id'=>$user->id,
            'amount'=>$this->amount,
            'created_at'=>date('Y-m-d H:i:d')
        ];
        
        Loan::create($data);
        
        return redirect()->to('/dashboard');
    }
}
