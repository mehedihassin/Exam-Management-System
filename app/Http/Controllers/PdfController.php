<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Support\Facades\Auth;
use Mpdf\Mpdf;



class PdfController extends Controller
{
    public function exam_question_paper_export()
    {
        $this->authorize('admin_controller_examinee');

        $id = Auth::id();
        $exam_id =  session()->get('exam_id');
        $mpdf = new \Mpdf\Mpdf();

        $records = Record::where('user_id', $id)->where('exam_id', $exam_id)->get();

        $html = view('backend.pdfs.exam_question_paper_pdf', compact('records'))->render();

        $mpdf->WriteHTML($html);

        $mpdf->Output('question_paper.pdf', 'I');
    }

    public function result_question_paper_export($id)
    {
        $this->authorize('admin_controller_examinee');



        $mpdf = new \Mpdf\Mpdf();

        $records = Record::where('user_id', auth()->user()->id)->where('exam_id', $id)->get();

        $html = view('backend.pdfs.result_question_paper_pdf', compact('records'))->render();

        $mpdf->WriteHTML($html);

        $mpdf->Output('question_paper.pdf', 'I');
    }
}
