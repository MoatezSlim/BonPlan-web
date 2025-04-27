<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Rating;
use App\Models\BonPlan;
use Illuminate\View\View;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RatingStoreRequest;
use App\Http\Requests\RatingUpdateRequest;

use function Laravel\Prompts\error;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Rating::class);

        $search = $request->get('search', '');

        $ratings = Rating::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.ratings.index', compact('ratings', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Rating::class);

        $users = User::pluck('name', 'id');
        $bonPlans = BonPlan::pluck('nom_bp', 'id');

        return view('app.ratings.create', compact('users', 'bonPlans'));
    }

    public function create2(Request $request, BonPlan $bonPlan)
{
    $this->authorize('create', Rating::class);

    $user = Filament::auth()->user();
    $users = User::pluck('name', 'id');

    
    return view('app.bon_plans.rating', compact('users', 'user', 'bonPlan'));
}
public function updateMoyRating($bon_plan_id)
{
    $bonPlan = BonPlan::find($bon_plan_id);

    // Calculez la moyenne des notes
    $MoyenRating = $bonPlan->ratings()->avg('rate_bp');

    
    $bonPlan->rate_moy = $MoyenRating;
    $bonPlan->save();
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$bon_plan_id): RedirectResponse
    {
        $this->authorize('create', Rating::class);
    
        $validator = Validator::make($request->all(), [
            'rate_bp' => 'required',
            'comment_bp' => 'required',
        ]);
       

        // Validate the request data
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        // Créez la notation en utilisant les données validées
        $user_id = Filament::auth()->user()->id;
        $validated = $validator->validated();
        $validated['user_id'] = $user_id;
        $validated['bon_plan_id'] = $bon_plan_id;
        $rating = Rating::create($validated);
        $this->updateMoyRating($bon_plan_id);
       
    
        return redirect()
    ->route('ratings.show',['user_id' => $user_id, 'bon_plan_id' => $bon_plan_id])
    ->withSuccess(__('crud.common.created'));
    }
    /**
     * Display the specified resource.
     */
    public function show($bon_plan_id, Rating $rating): View
    {
        $this->authorize('view', $rating);
    
        // Ensuite, filtrez les notations en fonction de l'ID du bon plan
        $ratings = Rating::where('bon_plan_id', $bon_plan_id)->get();
    
        // Récupérez le bon plan et l'utilisateur
        $bonPlan = BonPlan::find($bon_plan_id);
        $user = auth()->user();
    
        return view('app.bon_plans.Ratings', compact('ratings', 'rating', 'bonPlan', 'user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Rating $rating): View
    {
        $this->authorize('update', $rating);

        $users = User::pluck('name', 'id');
        $bonPlans = BonPlan::pluck('nom_bp', 'id');

        return view('app.ratings.edit', compact('rating', 'users', 'bonPlans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        RatingUpdateRequest $request,
        Rating $rating
    ): RedirectResponse {
        $this->authorize('update', $rating);

        $validated = $request->validated();

        $rating->update($validated);
        $this->updateMoyRating($rating->bon_plan_id);

        return redirect()
            ->route('ratings.edit', $rating)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Rating $rating): RedirectResponse
    {
        $this->authorize('delete', $rating);

        $rating->delete();
        $this->updateMoyRating($rating->bon_plan_id);

        return redirect()
            ->route('ratings.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
