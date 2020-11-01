<?php
namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Loan;

class UserLoans extends TableComponent
{
    use HtmlComponents;
    
    public $loadingIndicator = false;
    public $offlineIndicator = false;
    
    public $table_class = 'table-hover table-striped';
    public $thead_class = 'thead-dark';
    
    public function query() : Builder
    {
        $user = request()->user();
        return Loan::where('user_id', $user->id);
    }
    
    public function columns() : array
    {
        return [
            Column::make('ID')
            ->searchable()
            ->sortable()
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                    date_add($date, date_interval_create_from_date_string('7 days'));
                    if(date('Y-m-d H:i:d') > $date->format('Y-m-d H:i:d')){
                        $color = 'red';
                    }else{
                        $color = 'green';
                    }
                }else{
                    $color = 'red';
                }
                return $this->html('<span style="color:'.$color.'">'.$model->id.'</span>');
            }),
            Column::make('Amount')
            ->searchable()
            ->sortable()
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                    date_add($date, date_interval_create_from_date_string('7 days'));
                    if(date('Y-m-d H:i:d') > $date->format('Y-m-d H:i:d')){
                        $color = 'red';
                    }else{
                        $color = 'green';
                    }
                }else{
                    $color = 'red';
                }
                return $this->html('<span style="color:'.$color.'">'.$model->amount.'</span>');
            }),
            Column::make('Created_At')
            ->searchable()
            ->sortable()
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                    date_add($date, date_interval_create_from_date_string('7 days'));
                    if(date('Y-m-d H:i:d') > $date->format('Y-m-d H:i:d')){
                        $color = 'red';
                    }else{
                        $color = 'green';
                    }
                }else{
                    $color = 'red';
                }
                return $this->html('<span style="color:'.$color.'">'.$model->created_at.' | </span>');
            }),
            Column::make('Last_Payment_date')
            ->searchable()
            ->sortable()
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                    date_add($date, date_interval_create_from_date_string('7 days'));
                    if(date('Y-m-d H:i:d') > $date->format('Y-m-d H:i:d')){
                        $color = 'red';
                    }else{
                        $color = 'green';
                    }
                }else{
                    $color = 'red';
                }
                return $this->html('<span style="color:'.$color.'">'.$model->last_payment_date.' | </span>');
            }),
            Column::make('Next payment date')
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                }else{
                    $date = date_create_from_format('Y-m-d H:i:d', $model->created_at);
                }
                date_add($date, date_interval_create_from_date_string('7 days'));
                
                
                return $this->html($date->format('Y-m-d H:i:d').' | ');
            }),
            Column::make('Actions')
            ->format(function(Loan $model) {
                if($model->last_payment_date!=''){
                    $date = date_create_from_format('Y-m-d H:i:d', $model->last_payment_date);
                    date_add($date, date_interval_create_from_date_string('7 days'));
                    if(date('Y-m-d H:i:d') > $date->format('Y-m-d H:i:d')){
                        $html = '<a href="/loan/pay/'.$model->id.'">PAY</a>';
                    }else{
                        $html = '-';
                    }
                }else{
                    $html = '<a href="/loan/pay/'.$model->id.'">PAY</a>';
                }
                return $this->html($html);
            }),
            ];
    }
}