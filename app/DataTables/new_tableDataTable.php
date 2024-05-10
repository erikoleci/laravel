<?php

namespace App\DataTables;

use App\new_table;
use App\User;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class new_tableDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $user=User::all();
        return Datatables::of(User::query())
            ->addIndexColumn()

            ->addColumn ('checkbox',function($user){
                $btn= '<input onclick="checkUser_new('.$user->id.' , event.target.checked)" type="checkbox" name="checkbox" >';
                return $btn;
            })

            ->addColumn('account', function($user){

                if($user->account_id === 'black_panther') {
                    $btn5=' <img class="rounded-circle" src="'.asset('images/users/panther_logo.png').'" alt="user" width="65">';
                }
                elseif ($user->account_id === 'bull_bear') {
                    $btn5=' <img class="rounded-circle" src="'.asset('images/users/bull_logo.png').'" alt="user" width="65">';
                }


                elseif ($user->account_id === 'phoenix') {
                    $btn5=' <img class="rounded-circle" src="'.asset('images/users/phoenix_logo.png').'" alt="user" width="65">';
                }


                elseif ($user->account_id === 'kings') {
                    $btn5=' <img class="rounded-circle" src="'.asset('images/users/kings_logo.png').'" alt="user" width="65">';
                }


                elseif ($user->account_id === 'promo') {
                    $btn5=' <img class="rounded-circle" src="'.asset('images/users/promo_logo.png').'" alt="user" width="65">';
                }

                else $btn5=' <img class="rounded-circle" src="'.asset('images/users/admin_logo.png').'" alt="user" width="65">';


                return $btn5;

            })



            ->addColumn('view_user', function($user){
                $btn =
                    '<a href="http://account.com/admin/client/'.$user->id.'">'.$user->name.'</a>';
                return $btn;
            })


            ->addColumn('action', function($user){

                if(Cache::has('user-is-online-' . $user->id))
                    $btn3='<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else $btn3 ='<i class="far fa-circle font-16 onlineStatus offline"></i>';
                $btn1 = '<a onclick="delete_user_new('.$user->id.')"><i class="fa fa-times font-20 deleteUser"></i></a>';
                $btn2 = '<a href="http://account.com/login_user/'.$user->id.'"><i class="fa fa-user font-20"></i></a><input id="myInput'.$user->id.'" class="copyPassInput" value="'.$user->real_password.'"><i onclick="myFunction('.$user->id.')" title="'.$user->real_password.'" class="fa fa-eye  font-20 copyPassIcon"></i>';
                $btn4='<div class="d-flex">'.$btn2.' '.$btn1.' '.$btn3.'</div>';


                return $btn4;
            })



            ->addColumn('active', function($user){

                if($user->active){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_active_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeSwitch'.$user->id.'"><label class="custom-control-label" for="activeSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_active_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeSwitch'.$user->id.'"><label class="custom-control-label" for="activeSwitch'.$user->id.'"></label></div>';
                return $btn;
            })



            ->addColumn('exclient', function($user){

                if($user->exclient){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_exclient_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient'.$user->id.'"><label class="custom-control-label" for="activeExclient'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_exclient_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient'.$user->id.'"><label class="custom-control-label" for="activeExclient'.$user->id.'"></label></div>';
                return $btn;
            })


            ->addColumn('check_deposit', function($user){

                if($user->check_deposit){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_check_deposit_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="checkDeposit'.$user->id.'"><label class="custom-control-label" for="checkDeposit'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_check_deposit_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="checkDeposit'.$user->id.'"><label class="custom-control-label" for="checkDeposit'.$user->id.'"></label></div>';
                return $btn;
            })



            ->addColumn('formation', function($user){

                if($user->formation){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_formation_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation'.$user->id.'"><label class="custom-control-label" for="activeFormation'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_formation_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation'.$user->id.'"><label class="custom-control-label" for="activeFormation'.$user->id.'"></label></div>';
                return $btn;
            })


            ->addColumn('can_spin', function($user){

                if($user->can_spin){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_spin_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch'.$user->id.'"><label class="custom-control-label" for="spinSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_spin_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch'.$user->id.'"><label class="custom-control-label" for="spinSwitch'.$user->id.'"></label></div>';
                return $btn;
            })



            ->addColumn('can_withdraw', function($user){

                if($user->can_withdraw){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_withdraw_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch'.$user->id.'"><label class="custom-control-label" for="withdrawSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_withdraw_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch'.$user->id.'"><label class="custom-control-label" for="withdrawSwitch'.$user->id.'"></label></div>';
                return $btn;
            })




            ->addColumn('forex_signals', function($user){

                if($user->forex_signals){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_forex_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch'.$user->id.'"><label class="custom-control-label" for="forexSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_forex_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch'.$user->id.'"><label class="custom-control-label" for="forexSwitch'.$user->id.'"></label></div>';
                return $btn;
            })




            ->addColumn('commodities_signals', function($user){

                if($user->commodities_signals){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_commodities_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch'.$user->id.'"><label class="custom-control-label" for="commoditiesSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_commodities_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch'.$user->id.'"><label class="custom-control-label" for="commoditiesSwitch'.$user->id.'"></label></div>';
                return $btn;
            })




            ->addColumn('indices_signals', function($user){

                if($user->indices_signals){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_indices_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch'.$user->id.'"><label class="custom-control-label" for="indicesSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_indices_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch'.$user->id.'"><label class="custom-control-label" for="indicesSwitch'.$user->id.'"></label></div>';
                return $btn;
            })




            ->addColumn('stocks_signals', function($user){

                if($user->stocks_signals){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_stocks_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch'.$user->id.'"><label class="custom-control-label" for="stocksSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_stocks_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch'.$user->id.'"><label class="custom-control-label" for="stocksSwitch'.$user->id.'"></label></div>';
                return $btn;
            })



            ->addColumn('crypto_signals', function($user){

                if($user->crypto_signals){
                    $btn='<div class="custom-control any-switch custom-switch"><input checked onclick="set_crypto_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch'.$user->id.'"><label class="custom-control-label" for="cryptoSwitch'.$user->id.'"></label></div>';
                }
                else $btn='<div class="custom-control any-switch custom-switch"><input onclick="set_crypto_new('.$user->id.', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch'.$user->id.'"><label class="custom-control-label" for="cryptoSwitch'.$user->id.'"></label></div>';
                return $btn;
            })
            ->rawColumns(['checkbox','account','view_user','action','active','exclient','check_deposit','formation','can_spin','can_withdraw','forex_signals','commodities_signals','indices_signals','stocks_signals','crypto_signals'])
            ->make();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\new_table $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(new_table $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('new_table-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'new_table_' . date('YmdHis');
    }
}
