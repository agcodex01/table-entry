<?php

namespace App\Livewire;

use Closure;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class TableEntry extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    protected $columns = [];

    protected Builder | Closure | null $query = null;
    protected  Closure | null $modifyQueryUsing = null;
    public ?string  $heading;

    protected $actions = [];



    public function mount(
        array $columns = [],
        array $actions = [],
        Builder | Closure | null $query = null,
        Closure | null $modifyQueryUsing,
    ) {
        $this->columns = $columns;
        $this->actions = $actions;
        $this->query = $query;
        if ($modifyQueryUsing) {
            $this->modifyQueryUsing = $modifyQueryUsing;
        }
    }

    public function render()
    {
        return view('livewire.table-entry');
    }


    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function getModifyQueryUsing()
    {
        return $this->modifyQueryUsing;
    }

    public function table(Table $table): Table
    {
        $table
            ->heading($this->heading)
            ->query($this->getQuery())
            ->columns($this->getColumns())
            ->actions($this->getActions());

        if ($this->modifyQueryUsing) {
            $table->modifyQueryUsing($this->modifyQueryUsing);
        }

        return $table->paginated(false);
    }
}
