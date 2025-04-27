<?php

namespace App\Filament\Resources;

use App\Models\BonPlan;
use Filament\Forms\Form;
//use Filament\Resources\{Form, Table, Resource};
use filament\tables\table;
use Filament\{Tables, Forms};
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Filament\Filters\DateRangeFilter;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\BonPlanResource\Pages;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Filament\Resources\BonPlanResource\Widgets\bonplans;

class BonPlanResource extends Resource 
{
    protected static ?string $model = BonPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    
    protected static ?string $recordTitleAttribute = 'nom_bp';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Card::make()->schema([
                Grid::make(['default' => 0])->schema([
                    TextInput::make('nom_bp')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Nom Bp')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                        Select::make('categorie_bp')
                        ->options([
                            'clothing_store' => 'clothing_store',
                            'complex' => 'complex',
                            'coffee_shop' => 'coffee_shop',
                            'fastfood' => 'fastfood',
                            'store' => 'store',
                            'market' => 'market',
                            'educational' => 'educational',
                            'bar' => 'bar',
                            'restaurant' => 'restaurant',
                            'gym' => 'gym',
                            'tea_house' =>'tea_house',
                            
                        ])
                        ->required()
                        ->placeholder('Choisir une catégorie')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('tel_bp')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Tel Bp')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('desc_bp')
                        ->rules(['max:255', 'string'])
                        ->required()
                        ->placeholder('Desc Bp')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    select::make('location')
                    ->options([
                        'ariana' => 'Ariana',
                        'beja' => 'Beja',
                        'ben-arous' => 'Ben Arous',
                        'bizerte' => 'Bizerte',
                        'gabes' => 'Gabès',
                        'gafsa' => 'Gafsa',
                        'jendouba' => 'Jendouba',
                        'kairouan' => 'kairouan',
                        'kasserine' => 'Kasserine',
                        'kebili' => 'Kebili',
                        'kef' =>'Kef',
                        'mahdia' =>'Mahdia',
                        'manouba' =>'Manouba',
                        'medenine' =>'Medenine',
                        'monastir' =>'Monastir',
                        'nabeul' =>'Nabeul',
                        'sfax' =>'Sfax',
                        'sidi-bouzid' =>'Sidi Bouzid',
                        'siliana' =>'Siliana',
                        'sousse' =>'Sousse',
                        'tataouine' =>'Tataouine',
                        'tozeur' =>'Tozeur',
                        'tunis' =>'Tunis',
                        'zaghouan' =>'Zaghouan',
                        
                    ])
                    ->required()
                    ->placeholder('Choisir une location')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                    Select::make('user_id')
                        ->rules(['exists:users,id'])
                        ->required()
                        ->relationship('user', 'name')
                        ->searchable()
                        ->placeholder('User')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),

                    TextInput::make('ouverture')
                        ->rules(['max:255', 'string'])
                       // ->required()
                        ->placeholder('Ouverture')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                        
                    FileUpload::make('img')->image()
                        
                       
                    ->placeholder('Image')
                   // ->disk('local')
                    ->columnSpan([
                        'default' => 12,
                        'md' => 12,
                        'lg' => 12,
                    ]),

                    TextInput::make('fermuture')
                        ->rules(['max:255', 'string'])
                        //->required()
                        ->placeholder('Fermuture')
                        ->columnSpan([
                            'default' => 12,
                            'md' => 12,
                            'lg' => 12,
                        ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->poll('60s')
            ->columns([
                Tables\Columns\TextColumn::make('nom_bp')
                    ->toggleable()
                    ->searchable()
                    ->label('Name')
                    ->limit(50),
                    Tables\Columns\ImageColumn::make('img')
                    ->label('image')
                    ->toggleable(),
        
                Tables\Columns\TextColumn::make('categorie_bp')
                    ->toggleable()
                    ->label('category')
                  //  ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('tel_bp')
                    ->toggleable()
                    ->label('phone number')
                  //  ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('desc_bp')
                    ->toggleable()
                    ->label('Description')
                 //   ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('location')
                    ->toggleable()
                 //   ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('user.name')
                    ->toggleable()
                    ->label('User name')
                    ->limit(50),
                Tables\Columns\TextColumn::make('ouverture')
                    ->toggleable()
                    ->label('Open')
                   // ->searchable(true, null, true)
                    ->limit(50),
                Tables\Columns\TextColumn::make('fermuture')
                    ->toggleable()
                    ->label('Close')
                   // ->searchable(true, null, true)
                    ->limit(50),
            ])
            ->filters([
                DateRangeFilter::make('created_at'),

                SelectFilter::make('user_id')
                    ->relationship('user', 'name')
                    ->indicator('User')
                    ->multiple()
                    ->label('User'),
            ])
            ->bulkActions([
                ExportBulkAction::make()
            ])
            
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
    public static function getWidgets(): array
    {
        return [
            bonplans::class,
           
        ];
    }

    public static function getRelations(): array
    {
        return [
            BonPlanResource\RelationManagers\OffresRelationManager::class,
            BonPlanResource\RelationManagers\RatingsRelationManager::class,
            BonPlanResource\RelationManagers\MenusRelationManager::class,
        ];
    
   
       
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBonPlans::route('/'),
            'create' => Pages\CreateBonPlan::route('/create'),
            'view' => Pages\ViewBonPlan::route('/{record}'),
            'edit' => Pages\EditBonPlan::route('/{record}/edit'),
        ];
    }
}
