<?php

namespace App\Filament\Resources\PassportResource\Pages;

use App\Filament\Resources\PassportResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePassport extends CreateRecord
{
    public function mount(): void
    {
        abort_unless(auth()->user()->hasRole('admin'), 403);

        $this->authorizeAccess();

        $this->previousUrl = url()->previous();
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected static string $resource = PassportResource::class;
}
