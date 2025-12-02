<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $label = trim((string) $request->input('label', ''));
        $href = trim((string) $request->input('href', '#'));

        if ($label === '') {
            return redirect()->route('home')->with('error', 'Informe um nome para a funcionalidade.');
        }

        $features = (array) $request->session()->get('custom_features', []);
        $features[] = ['label' => $label, 'href' => $href];
        $request->session()->put('custom_features', $features);

        return redirect()->route('home')->with('status', 'Funcionalidade adicionada.');
    }

    public function destroy(Request $request, int $index): RedirectResponse
    {
        $features = (array) $request->session()->get('custom_features', []);
        if (array_key_exists($index, $features)) {
            unset($features[$index]);
            $request->session()->put('custom_features', array_values($features));

            return redirect()->route('home')->with('status', 'Funcionalidade removida.');
        }

        return redirect()->route('home')->with('error', 'Item não encontrado.');
    }
}
