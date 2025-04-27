<?php



namespace App\Filament\Widgets;

use Forms\Form;
use App\Models\User;
use App\Models\Event;
use Filament\Forms\Components\Grid;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Actions;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\EventResource;
use Filament\Forms\Components\DateTimePicker;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Event::class;
    public function config(): array
    {
        return [
            'firstDay' => 1,
            'headerToolbar' => [
                'left' => 'dayGridWeek,dayGridDay',
                'center' => 'title',
                'right' => 'prev,next today',
            ],
        ];
    }

    protected function headerActions(): array
    {
         // Vérifier si l'utilisateur est connecté et s'il est administrateur ou a le rôle "partenaire"
    $isAdminOrPartner = auth()->check() && auth()->user() instanceof User && (auth()->user()->isSuperAdmin() || auth()->user()->hasRole('partenaire'));

    // Définir les actions en fonction du statut d'administrateur ou de partenaire de l'utilisateur
    $actions = [];

    if ($isAdminOrPartner) {
        // Si l'utilisateur est un administrateur ou un partenaire, autoriser l'action de création
        $actions[] = Actions\CreateAction::make();
    }

    return $actions;
    }

    public function eventDidMount(): string {
        return <<<JS
            function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
                el.setAttribute("x-tooltip", "tooltip");
                el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
            }
        JS;
    }

    
        
    protected function modalActions(): array {
        // Vérifier si l'utilisateur est connecté et s'il est administrateur
        $isAdmin = auth()->check() && auth()->user() instanceof User && auth()->user()->isSuperAdmin();
    
        // Définir les actions en fonction du statut d'administrateur de l'utilisateur
        $actions = [];
    
        if ($isAdmin) {
            // Si l'utilisateur est un administrateur, autoriser les actions d'édition et de suppression
            $actions[] = Actions\EditAction::make()
                ->mountUsing(function (Event $record, Form $form, array $arguments) {
                    // Logique de montage pour l'action d'édition
                });
    
            $actions[] = Actions\DeleteAction::make();
        }
    
        return $actions;
    }
    

 
   
 
    
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
 
            Grid::make()
                ->schema([
                    DateTimePicker::make('start'),
 
                    DateTimePicker::make('end'),
                ]),
        ];
    }


    public function fetchEvents(array $fetchInfo): array
    {   
        return Event :: all()->toArray();
          
    }
    
}
