<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Button;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\UpdateButtonRequest;
use Illuminate\Contracts\Foundation\Application;

class ButtonController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Application|Factory|View
     */
    public function index()
    {
        $buttons = Button::with('color')->get()->chunk(3);
        return view('pages.dashboard', compact('buttons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Button $button
     * @return Application|Factory|View
     */
    public function edit(Button $button)
    {
        $colors = Color::where('name', '!=', 'DEFAULT')->get();
        return view('pages.edit', compact(['button', 'colors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Button $button
     * @param UpdateButtonRequest $request
     * @return RedirectResponse
     */
    public function update(Button $button, UpdateButtonRequest $request): RedirectResponse
    {
        $button->update($request->validated());
        return redirect()->route('dashboard');
    }

    /**
     * Update the specified resource in storage to default value.
     *
     * @param Button $button
     * @return RedirectResponse
     */
    public function destroy(Button $button): RedirectResponse
    {
        $defaultColor = Color::where('name', 'DEFAULT')->first();
        $fields = [
            'title' => '',
            'link'  => '',
            'color_id' => $defaultColor->id
        ];
        $button->update($fields);
        return redirect()->route('dashboard');
    }
}
