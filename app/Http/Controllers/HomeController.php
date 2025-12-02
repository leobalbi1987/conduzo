<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        $features = \App\Models\Feature::query()->where('visible', true)->orderBy('position')->get();

        $menus = [
            [
                'label' => 'Gestão',
                'items' => [
                    ['label' => 'Painel', 'href' => route('home')],
                    ['label' => 'Relatórios', 'href' => '#'],
                    ['label' => 'Configurações', 'href' => '#'],
                ],
            ],
            [
                'label' => 'Cadastros',
                'items' => [
                    ['label' => 'Empresas', 'href' => '#'],
                    ['label' => 'Unidades', 'href' => '#'],
                    ['label' => 'Usuários', 'href' => route('admin.users.index')],
                ],
            ],
            [
                'label' => 'Inspeção',
                'items' => [
                    ['label' => 'Checklist', 'href' => '#'],
                    ['label' => 'Agendar', 'href' => '#'],
                ],
            ],
            [
                'label' => 'NR-12',
                'items' => [
                    ['label' => 'Máquinas', 'href' => '#'],
                ],
            ],
            [
                'label' => 'NR-10',
                'items' => [
                    ['label' => 'Equipamentos', 'href' => '#'],
                ],
            ],
            [
                'label' => 'NR-13',
                'items' => [
                    ['label' => 'Equipamentos', 'href' => '#'],
                ],
            ],
            [
                'label' => 'NR-33',
                'items' => [
                    ['label' => 'Espaços Confinados', 'href' => '#'],
                ],
            ],
            [
                'label' => 'Suporte',
                'items' => [
                    ['label' => 'Ajuda', 'href' => '#'],
                    ['label' => 'Contato', 'href' => '#'],
                ],
            ],
        ];

        $groups = $features->groupBy(fn ($f) => $f->group ?: 'Personalizados');
        foreach ($groups as $gLabel => $groupItems) {
            $parents = $groupItems->filter(fn ($f) => $f->parent_id === null)->values();
            $items = $parents->map(function ($p) use ($groupItems) {
                $children = $groupItems->filter(fn ($c) => $c->parent_id === $p->id)->values();
                return [
                    'label' => $p->label,
                    'href' => $p->href ?: '#',
                    'children' => $children->map(fn ($c) => [
                        'label' => $c->label,
                        'href' => $c->href ?: '#',
                    ])->all(),
                ];
            })->all();

            $menus[] = [
                'label' => $gLabel,
                'items' => $items,
            ];
        }

        $metrics = [
            ['label' => 'NR-10', 'sub' => 'Equipamentos NR-10', 'value' => 0, 'color' => '#8dd3ff', 'icon' => '⚡'],
            ['label' => 'NR-12', 'sub' => 'Máquinas NR-12', 'value' => 3, 'color' => '#ffd166', 'icon' => '⚙️'],
            ['label' => 'NR-13', 'sub' => 'Equipamentos NR-13', 'value' => 0, 'color' => '#ef476f', 'icon' => '🛢️'],
            ['label' => 'NR-33', 'sub' => 'Espaços NR-33', 'value' => 0, 'color' => '#06d6a0', 'icon' => '🕳️'],
            ['label' => 'APRS', 'sub' => 'APRS', 'value' => 0, 'color' => '#ff8c42', 'icon' => '🛡️'],
            ['label' => 'Riscos', 'sub' => 'Riscos', 'value' => 4, 'color' => '#f9c74f', 'icon' => '⚠️'],
            ['label' => 'Laudos', 'sub' => 'Laudos', 'value' => 0, 'color' => '#58ccff', 'icon' => '📝'],
            ['label' => 'Manutenção', 'sub' => 'Manutenção', 'value' => 0, 'color' => '#c0c0c0', 'icon' => '🔧'],
        ];

        $credits = [
            'license_number' => 13617,
            'license_expiration' => now()->addMonths(13),
            'activated' => 2,
            'used' => 1,
            'pending' => 1,
            'percent_used' => 50.0,
        ];

        $videos = [
            ['title' => 'Como Inserir Logo e Assinatura nos Relatórios', 'href' => '#'],
            ['title' => 'Mentoria Essencial - NR-10', 'href' => '#'],
            ['title' => 'Mentoria Essencial - NR-13', 'href' => '#'],
            ['title' => 'Mentoria Essencial - NR-12', 'href' => '#'],
        ];

        $news = [
            ['date' => now()->subDays(30), 'title' => 'Atualizações de Outubro! Confira as novas atualizações e recursos da plataforma!'],
            ['date' => now()->subDays(60), 'title' => 'Atualizações de Setembro! Confira as novas atualizações e recursos da plataforma!'],
            ['date' => now()->subDays(90), 'title' => 'Atualizações de Agosto! Confira as novidades!'],
        ];

        $links = [
            ['label' => 'Acesso Remoto', 'desc' => 'Baixe em seu dispositivo para receber suporte remoto.', 'href' => '#'],
            ['label' => 'Converter PDF para WORD', 'desc' => 'Converta análises e laudos em Word.', 'href' => '#'],
            ['label' => 'Gautica Ajuda', 'desc' => 'Manuais GNR10, GNR12, GNR13, GNR33, inspeções, modelos.', 'href' => '#'],
        ];

        return view('home', compact('menus', 'metrics', 'credits', 'videos', 'news', 'links'));
    }
}