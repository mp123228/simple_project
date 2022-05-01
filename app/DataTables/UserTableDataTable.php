<?php

namespace App\DataTables;

use App\UserModel;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserTableDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            // ->addColumn('image_path', ' <img src="{{$image_path}}" />')
            ->addColumn('imagelowpx_path', '<img src="{{$imagelowpx_path}}" ></img>')
            // ->addColumn('thumbnail', '<img src="{{$thumbnail}}" ></img>')
            ->addColumn('delete', '<button><a href="/delrecord/{{$id}}">Deleted</a></button>')
            ->editColumn('update', '<button><a href="/updateform/{{$id}}">Update</a></button>')
            ->rawColumns(['image_path','imagelowpx_path','thumbnail','delete','update']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\UserTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserModel $model)
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
                    ->setTableId('details')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);

    }
    


    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'UserModel_' . date('YmdHis');
    }

    public function getColumns()
    {
        return [
            'firstname',
            'lastname',
            'email',
            'password',
            'types',
            'status',
            // 'image_path',
            'imagelowpx_path',
            // 'thumbnail',
            'delete',
            'update'
        ];
    }
    
}
