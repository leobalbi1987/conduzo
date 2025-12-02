<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::query()->orderBy('position')->get();

        return view('admin.features.index', compact('features'));
    }

    public function store(Request $request): RedirectResponse
    {
        $label = trim((string) $request->input('label', ''));
        $href = trim((string) $request->input('href', ''));
        $visible = (bool) $request->boolean('visible', true);
        $position = (int) $request->input('position', 0);
        $group = trim((string) $request->input('group', 'Personalizados'));
        $icon = trim((string) $request->input('icon', ''));
        $parentId = $request->input('parent_id');

        if ($label === '') {
            return back()->with('error', 'Informe um nome para a funcionalidade.');
        }

        Feature::query()->create([
            'label' => $label,
            'href' => $href ?: null,
            'visible' => $visible,
            'position' => $position,
            'group' => $group ?: 'Personalizados',
            'icon' => $icon ?: null,
            'parent_id' => $parentId ? (int) $parentId : null,
        ]);

        return back()->with('status', 'Funcionalidade adicionada.');
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $label = trim((string) $request->input('label', $feature->label));
        $href = trim((string) $request->input('href', (string) $feature->href));
        $visible = (bool) $request->boolean('visible', $feature->visible);
        $position = (int) $request->input('position', (int) $feature->position);
        $group = trim((string) $request->input('group', (string) $feature->group));
        $icon = trim((string) $request->input('icon', (string) $feature->icon));
        $parentId = $request->input('parent_id', $feature->parent_id);

        $feature->update([
            'label' => $label,
            'href' => $href ?: null,
            'visible' => $visible,
            'position' => $position,
            'group' => $group ?: 'Personalizados',
            'icon' => $icon ?: null,
            'parent_id' => $parentId ? (int) $parentId : null,
        ]);

        return back()->with('status', 'Funcionalidade atualizada.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return back()->with('status', 'Funcionalidade removida.');
    }
}
