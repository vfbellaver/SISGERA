<?php

namespace Sisgera\Http\Controllers\Api;

use Illuminate\Http\Request;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Sisgera\Http\Controllers\Controller;
use Sisgera\Models\Requerimento;

class PdfController extends Controller
{
    public function pdf(Requerimento $requerimento)
    {
        ini_set('max_execution_time', 5000);

        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        //612 × 792 points
        $gen = new Mpdf([
            'fontDir'       => array_merge($fontDirs, [
                base_path() . '/resources/fonts/Roboto',
            ]),
            'fontdata'      => $fontData + [
                    'Roboto' => [
                        'R'  => 'Roboto-Regular.ttf',
                        'I'  => 'Roboto-Italic.ttf',
                        'B'  => 'Roboto-Bold.ttf',
                        'BI' => 'Roboto-BoldItalic.ttf',
                    ],
                ],
            'default_font'  => 'Roboto',
            'mode'          => 'c',
            'format'        => 'Letter',
            'margin_left'   => 12,
            'margin_right'  => 12,
            'margin_top'    => 20,
            'margin_bottom' => 20,
        ]);

        $gen->SetTitle($requerimento->name);

        $requerente = $requerimento->usuario->toArray();

        $content = view('requerimento.pdf', [
            'requerimento' => $requerimento,
            'usuario'    => $requerente,

        ]);

        $gen->WriteHTML($content);
        $pdf = $gen->Output('requerimento.pdf', 'S');

        return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Length', strlen($pdf))
            ->header('Content-Disposition', "attachment; filename=\"requerimento.pdf\"");
    }
}
