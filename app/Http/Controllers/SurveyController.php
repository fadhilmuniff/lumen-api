<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $survey = Survey::all();
        return response()->json($survey);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            "judul" => "required",
            "deskripsi" => "required",
        ]);
        $data = $request->all();
        $survey = Survey::create($data);

        return response()->json([
            'message' => 'Berhasil membuat survey',
            'survey' => $survey
        ]);
    }

    public function show($id)
    {
        $survey = Survey::find($id);

        if (!$survey) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        // return response()->json($survey);
        return response()->json([
            'message' => 'Berhasil menampilkan survey',
            'survey' => $survey
        ]);
    }

    public function update(Request $request, $id)
    {
        $survey = Survey::find($id);

        if (!$survey) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            "judul" => "required",
            "deskripsi" => "required",
        ]);

        $data = $request->all();
        $survey->fill($data);
        $survey->save();

        return response()->json([
            'message' => 'Berhasil mengubah survey',
            'survey' => $survey
        ]);
    }

    public function delete($id)
    {
        $survey = Survey::find($id);

        if (!$survey) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $survey->delete();
        return response()->json([
            'message' => 'Delete successfully'
        ]);
    }
}
