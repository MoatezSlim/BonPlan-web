<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BonPlan;
use App\Models\Favouris;
use Illuminate\View\View;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BonPlanStoreRequest;
use App\Http\Requests\BonPlanUpdateRequest;
use Illuminate\Support\Facades\Validator;
class BonPlanController extends Controller
{

    public function getOneBonPlans($bonPlan)
    {
        // Retrieve the BonPlan from the database
        $bonPlan = BonPlan::find($bonPlan);

        // Return the BonPlan as JSON response
        return response()->json($bonPlan);
    }
    public function getAllBonPlans()
    {
        // Retrieve all BonPlans from the database
        $bonPlans = BonPlan::all();

        // Return the BonPlans as JSON response
        return response()->json($bonPlans);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', BonPlan::class);

        $search = $request->get('search', '');

        $bonPlans = BonPlan::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.bon_plans.index', compact('bonPlans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', BonPlan::class);

        $users = User::pluck('name', 'id');

        return view('app.bon_plans.create' ,compact('users'));
    }

    public function create2(Request $request): View
    {
        $this->authorize('create', BonPlan::class);

        $users = User::pluck('name', 'id');
        

        return view('app.bon_plans.c' ,compact('users'));
    }

    public function create3(Request $request): View
    {
        $this->authorize('create', BonPlan::class);

        $user = Filament::auth()->user();
        $users = User::pluck('name', 'id');

        return view('app.bon_plans.c' ,compact('users', 'user'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $this->authorize('create', BonPlan::class);

    $validator = Validator::make($request->all(), [
        
        'nom_bp' => ['required', 'max:255', 'string'],
        'categorie_bp' => ['required', 'max:255', 'string'],
        'tel_bp' => ['required', 'max:255', 'string'],
        'desc_bp' => ['required', 'max:255', 'string'],
        'location' => ['required', 'max:255', 'string'],
        'ouverture' => ['required'],
        'fermuture' => ['required'],
        'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
    ]);

    // Validate the request data
    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    //new
    // Store the uploaded image
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = $image->getClientOriginalName(); // Extract original file name
        $imagePath = $image->storeAs('', $imageName, 'public');
    }

    // Retrieve the authenticated user's ID
    $user_id = Auth::id();

    // Retrieve the validated input
    $validated = $validator->validated();

    // Add the user_id to the validated data
    $validated['user_id'] = $user_id;
    $validated['img'] = $imageName;


    // Create the BonPlan instance
    $bonPlan = BonPlan::create($validated);

    return redirect()
    ->route('bon-plans.create3', $user_id)
    ->withSuccess(__('crud.common.created'));
}
    /**
     * Display the specified resource.
     */
    public function show(Request $request, BonPlan $bonPlan): View
    {
        $this->authorize('view', $bonPlan);

        return view('app.bon_plans.show', compact('bonPlan'));
    }
    
    public function show2(Request $request, BonPlan $bonPlan): View
    {
        $this->authorize('view', $bonPlan);
        $user = Filament::auth()->user();

        return view('app.bon_plans.c', compact('bonPlan', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, BonPlan $bonPlan): View
    {
        $this->authorize('update', $bonPlan);

        $users = User::pluck('name', 'id');

        return view('app.bon_plans.edit', compact('bonPlan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BonPlanUpdateRequest $request,
        BonPlan $bonPlan
    ): RedirectResponse {
        $this->authorize('update', $bonPlan);

        $validated = $request->validated();

        $bonPlan->update($validated);

        return redirect()
            ->route('bon-plans.edit', $bonPlan)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        BonPlan $bonPlan
    ): RedirectResponse {
        $this->authorize('delete', $bonPlan);

        $bonPlan->delete();

        return redirect()
            ->route('bon-plans.index')
            ->withSuccess(__('crud.common.removed'));
    }

//fav
    /**
     * Toggle the favorite status of a BonPlan for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BonPlan  $bonPlan
     * @return \Illuminate\Http\Response
     */
    public function toggleFavorite($userId, $bonPlanId)
    {
        // Retrieve the User from the database
        $user = User::find($userId);

        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Check if the bonplan is already favorited by the user
        $isFavorited = $user->favourises()->where('bon_plan_id', $bonPlanId)->exists();

        // Toggle the favorite status

        if ($isFavorited) {
            $user->favourises()->where('bon_plan_id', $bonPlanId)->delete();
        } else {
            $user->favourises()->create(['bon_plan_id' => $bonPlanId]);
        }

        // Return the updated favorite status as JSON response
        return response()->json(['is_favorited' => !$isFavorited]);
    }

    /**
     * Get the IDs of favorite BonPlans for the authenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getFavoriteBonplans($userId)
    {
        // Retrieve the User from the database
        $user = User::find($userId);

        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Retrieve IDs of favorite BonPlans for the user
        $favoriteBonplans = $user->favourises()->pluck('bon_plan_id')->toArray();

        // Return the IDs as JSON response
        return response()->json($favoriteBonplans);
    }

    /**
     * Get if a BonPlan is favorited by the authenticated user.
     */
    public function isFavorited($userId, $bonPlanId)
    {
        $user = User::find($userId);

        if ($user === null) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Check if the bonplan is favorited by the user
        $isFavorited = $user->favourises()->where('bon_plan_id', $bonPlanId)->exists();

        // Return the result as JSON response
        return response()->json(['is_favorited' => $isFavorited]);
    }


    //filtred bonplans
    /**
     * Filter BonPlans based on the provided criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        // Retrieve query parameters from the request
        $category = $request->input('category');
        $city = $request->input('city');
        $offersOnly = $request->has('offers_only');
        $openOnly = $request->has('open_only');
        $minRating = $request->input('min_rating');

        // Start building the query
        $query = BonPlan::query();

        // Apply filters based on the provided criteria
        if ($category) {
            $query->where('categorie_bp', $category);
        }

        if ($city) {
            $query->where('location', $city);
        }

        if ($offersOnly) {
            $query->has('offres');
        }

        if ($openOnly) {
            $query->where('ouverture', '<=', now())->where('fermuture', '>=', now());
        }

        if ($minRating) {
            $query->where('rate_moy', '>=', $minRating);
        }

        // Retrieve the filtered results
        $filteredBonPlans = $query->get();

        // Return the filtered results
        return response()->json($filteredBonPlans);
    }
}