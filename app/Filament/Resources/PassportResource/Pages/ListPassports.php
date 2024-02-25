<?php

namespace App\Filament\Resources\PassportResource\Pages;

use App\Filament\Resources\PassportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPassports extends ListRecords
{
    protected static string $resource = PassportResource::class;

    public function mount(): void
    {
        abort_unless(auth()->user()->hasRole('admin'), 403);

        $this->authorizeAccess();

        $this->previousUrl = url()->previous();
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
