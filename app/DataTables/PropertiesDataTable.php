<?php

namespace App\DataTables;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertiesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'properties.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Property $model): QueryBuilder
    {
        
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('properties-table')
            ->addTableClass(['table-striped'])
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->scrollX(false)
            ->scrollCollapse(true)
            ->scrollY('1000px')
            ->serverSide(true)
            ->processing(true)  // Enable processing indicator
            ->dom('BlfrtipC')     // Adjust DataTables DOM elements as needed
            ->orderBy(1)
            ->languageSearchPlaceholder('Search Here...')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->lengthMenu([10, 20, 30, 40, 50, 100, 200, 300, 400, 500]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $column= [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::computed('DT_RowIndex')->title('#'),
            Column::computed('type_name')->title('Property Type')->addClass('text-nowrap'),
            Column::computed('Ican_type')->title('Ican Type')->addClass('text-nowrap'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')->exportable(false)->printable(false)->width(60)->addClass('text-center'),
        ];
        return $column;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Properties_' . date('YmdHis');
    }
}
